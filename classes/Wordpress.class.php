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

class Wordpress {

    /**
     * @var [] Global settings
     */
	private $_properties = array(

						'url'				=> '',
						'image'				=> '',
						'POST'				=> '',
						'site_description'	=> '',
						'user_data'			=> '', // Array
						'user_name'			=> '',
						'user_description'	=> '',
						'category'			=> '', // Array
						'category_name'		=> '',
						'headline'			=> '',
						'datePublished'		=> '',
						'mainEntityOfPage'	=> '',
						'dateModified'		=> '',
						'site_url'			=> '',
						'site_name'			=> '',
						'site_language'		=> '',
						'post_description'	=> '',
						'contact_page'		=> '/contact/',
						'template_dir'		=> ''

		);

public function __construct(){

}

public function __set($property,$value){
    $this->$property = $value;
    return $this->_property;
}

public function __get($property){
    return $this->_property;
}

/**
* @var is_single()
* @param POST[$id]
* @return Boolean
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#isSingle()
*/
public function isSingle(){

	if (is_single()) {
		return true;
	}
	else{
		return false;
	}

}

/**
* @var is_front_page()
* @param POST[$id]
* @return Boolean
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#isFrontpage()
*/
public function isFrontpage(){

	if (is_front_page()) {
		return true;
	}
	else{
		return false;
	}

}

/**
* @var is_author()
* @param POST[$id]
* @return Boolean
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#isAuthor()
*/
public function isAuthor(){

	if (is_author()) {
		return true;
	}
	else{
		return false;
	}

}

/**
* @var is_author()
* @param POST[$id]
* @return Boolean
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#isContact()
*/
public function isContact(){

	if (self::getUrl() == self::getSiteurl().$this->_properties['contact_page']) {
		return true;
	}
	else{
		return false;
	}

}

/**
* @var $this->_properties['POST']
* @param POST[$id]
* @return []
*/
private function _getPostdata(){

	global $post;
	$this->_properties['POST'] = $post;
  	return $this->_properties['POST'];

}

/**
* @var $this->_properties['user_data']
* @param POST[$id]
* @return []
*/
private function _getUserdata(){

	// get global post value
	self::_getPostdata();

	$this->_properties['user_data'] = get_userdata($this->_properties['POST']->post_author);
	return $this->_properties['user_data'];

}

/**
* @var $this->_properties['user_data']
* @param POST[$id]
* @return String
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getUsername()
*/
public function getUsername(){

	// get global values of user
	self::_getUserdata();
	// get user name
	$this->_properties['user_name'] = $this->_properties['user_data']->display_name;
	return $this->_properties['user_name'];

}

/**
* @var $this->_properties['user_data']
* @param POST[$id]
* @return String
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getUserphone()
*/
public function getUserphone(){

	// get global values of user
	self::_getUserdata();
	// get user name
	$this->_properties['user_phone'] = $this->_properties['user_data']->user_email;
	return $this->_properties['user_phone'];

}

/**
* @var $this->_properties['user_description']
* @param POST[$id]
* @return String
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getUserdescription()
*/
public function getUserdescription(){


	$this->_properties['user_description'] = get_the_author_meta('description');
	return $this->_properties['user_description'];

}

/**
* @var $this->_properties['url']
* @param POST[$id]
* @return String , permalink
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getUrl()
*/
public function getUrl(){

	$this->_properties['url'] = get_permalink();
	return $this->_properties['url'];

}

/**
* @var $this->_properties['image']
* @param POST[$id]
* @return String
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getImage()
*/
public function getImage(){

	// 
	self::_getPostdata();

	$this->_properties['image'] = wp_get_attachment_url(get_post_thumbnail_id($this->_properties['POST']->ID));
	return $this->_properties['image'];

}

/**
* @var $this->_properties['headline']
* @param POST[$id]
* @return String
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getTitle()
*/
public function getTitle(){

	$this->_properties['headline'] = get_the_title();
	return $this->_properties['headline'];

}

/**
* @var $this->_properties['post_description']
* @param POST[$id]
* @return String
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getArticleresume()
*/
public function getArticleresume(){

	$this->_properties['post_description'] = get_the_excerpt();
	return $this->_properties['post_description'];

}

/**
* @var $this->_properties['datePublished']
* @param POST[$id]
* @return String
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getPublishdate()
*/
public function getPublishdate(){

	$this->_properties['datePublished'] = the_date('c','','','');
	return $this->_properties['datePublished'];

}

/**
* @var $this->_properties['dateModified']
* @param POST[$id]
* @return String
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getModifieddate()
*/
public function getModifieddate(){

	$this->_properties['dateModified'] = the_modified_date('c','','','');
	return $this->_properties['dateModified'];

}

/**
* @var $this->_properties['mainEntityOfPage']
* @param POST[$id]
* @return String, Blog url
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getBlogurl()
*/
public function getBlogurl(){

	$this->_properties['mainEntityOfPage'] = get_permalink( get_option( 'page_for_posts' ) );
	return $this->_properties['mainEntityOfPage'];

}

/**
* @var $this->_properties['site_url']
* @param POST[$id]
* @return String, Site maine url
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getSiteurl()
*/
public function getSiteurl(){

	$this->_properties['site_url'] = get_site_url();
	return $this->_properties['site_url'];

}


/**
* @var $this->_properties['category']
* @param POST[$id]
* @return String, Article category
*/
private function _getCategorydata(){

	$this->_properties['category'] = get_the_category();
	return $this->_properties['category'];

}

/**
* @var $this->_properties['category_name']
* @param POST[$id]
* @return String
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getCategoryname()
*/
public function getCategoryname(){

	// get global values of category
	self::_getCategorydata();
	// get category name
	if (isset($this->_properties['category'][0]->cat_name)) {

		$this->_properties['category_name'] = $this->_properties['category'][0]->cat_name;
		return $this->_properties['category_name'];

	}
}

/**
* @var $this->_properties['site_name']
* @param POST[$id]
* @return String, Site name, Organization
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getSitename()
*/
public function getSitename(){

	$this->_properties['site_name'] = get_bloginfo('name');
	return $this->_properties['site_name'];

}

/**
* @var $this->_properties['site_description']
* @param POST[$id]
* @return String, Site description, Organization
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getSitdescription()
*/
public function getSitedescription(){

	$this->_properties['site_description'] = get_bloginfo('description');
	return $this->_properties['site_description'];

}

/**
* @var $this->_properties['site_description']
* @param POST[$id]
* @return String, Site description, Organization
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getSitdescription()
*/
public function getSitelanguage(){

	$this->_properties['site_language'] = get_bloginfo('language');

	if (is_string($this->_properties['site_language']) && !is_array($this->_properties['site_language'])) {

		switch ($this->_properties['site_language']) {
			case 'fr-FR':
				$this->_properties['site_language'] = 'Frensh';
				break;

			case 'en-US':
				$this->_properties['site_language'] = 'English';
				break;
		}
		return $this->_properties['site_language'];

	}

}

/**
* @var $this->_properties['site_description']
* @param POST[$id]
* @return String, Site description, Organization
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getTemplatedirectory()
*/
public function getTemplatedirectory(){

	$this->_properties['template_dir'] = get_template_directory();
	return $this->_properties['template_dir'];

}

// End Class
}
?>