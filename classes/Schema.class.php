<?php
/**
* @package  :  PrestigeSEO | Structured Data class for Wordpress(Avada)
* @author   :  Viaprestige | JIHAD SINNAOUR
* @copyright:  2014 - 2015 Viaprestige
* @category	:  PHP
* @license	:  MIT
* @version  :  1.0 Stable release @29/12/2015
* @param    :  JSON-LD
* @return   :  Array[], String
* @link     :  https://github.com/Viaprestige/PrestigeSEO
*/

Namespace PrestigeSEO\classes;
use \PrestigeSEO\classes\Wordpress;
use \PrestigeSEO\classes\Avada;
use \PrestigeSEO\classes\Cache;

class Schema extends Wordpress {

    /**
     * @var [] Properties
     */
	private $_properties	= array(

						'@context'			=> 'http://schema.org/',  	// Schema.org context
						'@type'				=> '',
						'name'				=> '',
						'url'				=> '',
						'author'			=> '',
						'authorType'		=> '',
						'address'			=> '',
						'authorName'		=> '',
						'headline'			=> '',
						'datePublished'		=> '',
						'dateModified'		=> '',
						'image'				=> '',
						'ArticleSection'	=> '',
						'Publisher'			=> '',
						'mainEntityOfPage'	=> '',	
						'logo'				=> '',
						'sameAs'			=> [],
						'contactPoint'		=> [],
						'telephone'			=> '',
						'email'				=> '',
						'contactType'		=> ''

	);

    /**
     * @var [] Objects
     */
	private $_objects = array('Avada' => '');

    /**
     * @var [] Returns
     */
	private $_results = array('HTML'  => '');

public function __construct(){

	// instance Avada
	self::_instanceClass();
	// Print results
	self::_printSchema();

}

public function __set($property,$value){

    $this->$property = $value;
    return $this->_property;

}

public function __get($property){

    return $this->_property;

}

/**
* @var $this->_properties
* @param viod
* @return Json, String
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#_printSchema()
*/
private function _printSchema(){

// Set values to properties
self::_setProperties();

$this->_results['HTML']  = '<!-- PrestigeSEO by Viaprestige | Structured Data JSON-LD -->';
$this->_results['HTML'] .= '<script type="application/ld+json">';
$this->_results['HTML'] .= json_encode(array_filter($this->_properties));
$this->_results['HTML'] .= '</script>';

// Print json in script tag
echo $this->_results['HTML'];

}

/**
* @var $this->_objects['Avada']
* @param viod
* @return Object
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#_instanceClass()
*/
private function _instanceClass(){

    $this->_objects['Avada'] = new Avada();
    return $this->_objects['Avada'];

}

/**
* @var $this->_properties
* @param viod
* @return [], String
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#_setProperties()
*/
private function _setProperties(){

	// Check if is Article
	if ( parent::isSingle() == true && !parent::isFrontpage() && !parent::isAuthor() ) {
		// _properties['@context'] is set to default
		$this->_properties['@type'] 			= 'Article'; // Static value
		$this->_properties['url']				= parent::getUrl();
		$this->_properties['author'] 	= array (

			'@type' => 'Person', // Static value
			'name' => parent::getUsername()

			);
		$this->_properties['headline']			= parent::getTitle();
		$this->_properties['datePublished']		= parent::getPublishdate();
		$this->_properties['dateModified']		= parent::getModifieddate();
		$this->_properties['mainEntityOfPage']	= parent::getBlogurl();
		$this->_properties['ArticleSection'] 	= parent::getCategoryname();
		$this->_properties['description']		= parent::getArticleresume();
		$this->_properties['image'] 	= array(

					"@type"  => "ImageObject",
				    "url" 	 => parent::getImage(),
				    "width"  => 800,
				    "height" => 800

			);
		$this->_properties['Publisher'] = array (

			// Static value
			'@type' => 'Organization',
			'name' 	=> 'Viaprestige',
			'url'	=> 'http://viaprestige-agency.com/',
			'logo'	=> array(

					"@type"  => "ImageObject",
				    "url" 	 => "http://viaprestige-agency.com/wp-content/uploads/2015/10/logo-viaprestige.png",
				    "width"  => 250,
				    "height" => 60

				)
			);

		return $this->_properties;
		break;
	}
	// Check if is Homepage
	elseif (parent::isFrontpage() == true && !parent::isAuthor() && !parent::isSingle() ) {
		// _properties['@context'] is set to default
		$this->_properties['@type'] 		= 'Organization'; // Static value
		$this->_properties['name'] 			= parent::getSitename();
		$this->_properties['logo']			= $this->_objects['Avada']->getLogo();
		$this->_properties['description']	= parent::getSitedescription();
		$this->_properties['url'] 			= parent::getUrl();
		$this->_properties['sameAs'] 		= array(

									    $this->_objects['Avada']->getSocial('facebook'),
									    $this->_objects['Avada']->getSocial('twitter'),
									    $this->_objects['Avada']->getSocial('linkedin'),
									    $this->_objects['Avada']->getSocial('google')
  							);

		$this->_properties['contactPoint'] 	= array(
								    array(
								    	"@type" 				=> "ContactPoint", // Static value
								    	"telephone" 			=> $this->_objects['Avada']->getPhone(),
								    	"email" 				=> $this->_objects['Avada']->getMail(),
								    	"contactType" 			=> "customer service", // Static value
								    	//"contactOption" 		=> "TollFree", // Static value
								    	"availableLanguage"		=> parent::getSitelanguage() // array("French","English") // Static value
								    )
						  	);

		$this->_properties['address'] 		= array(
								    array(
								    	"@type" 				=> "PostalAddress", // Static value
								    	"addressLocality" 		=> $this->_objects['Avada']->getAddress('addressLocality'),
								    	"postalCode" 			=> $this->_objects['Avada']->getAddress('postalCode'),
								    	"streetAddress" 		=> $this->_objects['Avada']->getAddress('streetAddress'),
								    )
						  	);

		return $this->_properties;
		break;
	}
	// Check if is Author page
	elseif (parent::isAuthor() == true && !parent::isFrontpage() && !parent::isSingle() ) {
		// _properties['@context'] is set to default
		$this->_properties['@type'] 		= 'Person'; // Static value
		$this->_properties['name'] 			= parent::getUsername();
		$this->_properties['telephone'] 	= $this->_objects['Avada']->getPhone();		
		$this->_properties['sameAs'] 		= array(

									    $this->_objects['Avada']->getSocial('facebook'),
									    $this->_objects['Avada']->getSocial('twitter'),
									    $this->_objects['Avada']->getSocial('linkedin'),
									    $this->_objects['Avada']->getSocial('google')
  							);

		return $this->_properties;
		break;
	}
	// Check if is Page Contact
	elseif (parent::isContact() == true) {
		// _properties['@context'] is set to default
		$this->_properties['@type'] 		= 'LocalBusiness'; // Static value
		$this->_properties['name'] 			= parent::getSitename();
		$this->_properties['telephone'] 	= $this->_objects['Avada']->getPhone();		
		$this->_properties['address'] 		= array(
								    array(
								    	"@type" 				=> "PostalAddress", // Static value
								    	"addressLocality" 		=> $this->_objects['Avada']->getAddress('addressLocality'),
								    	"postalCode" 			=> $this->_objects['Avada']->getAddress('postalCode'),
								    	"streetAddress" 		=> $this->_objects['Avada']->getAddress('streetAddress'),
								    )
						  	);

		return $this->_properties;
		break;
	}

} // End Methode _setProperties

// End Class
}
?>