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

class Avada {

    /**
     * @var [] Global settings
     */
	private $_properties = array(

						'logo'			=> '',
						'socialmedia'	=> '',
						'phone'			=> '',
						'mail'			=> ''

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
* @var $this->_properties['logo']
* @param viod
* @return String, Logo full url
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getLogo()
*/
public function getLogo(){

	$this->_properties['logo'] = Avada()->settings->get('logo');
	return $this->_properties['logo'];
}

/**
* @var $this->_properties['socialmedia']
* @param $name, Social network name
* @return String, Social network full url
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getSocial()
*/
public function getSocial($name){

switch ($name) {

	case 'facebook':
		$this->_properties['socialmedia'] = Avada()->settings->get('facebook_link');
		break;

	case 'twitter':
		$this->_properties['socialmedia'] = Avada()->settings->get('twitter_link');
		break;

	case 'google':
		$this->_properties['socialmedia'] = Avada()->settings->get('google_link');
		break;

	case 'linkedin':
		$this->_properties['socialmedia'] = Avada()->settings->get('linkedin_link');
		break;

	default:
		#void
		break;
}
return $this->_properties['socialmedia'];

}

/**
* @var $this->_properties['phone']
* @param void
* @return String, Phone number
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getPhone()
*/
public function getPhone(){

	$this->_properties['phone'] = Avada()->settings->get('header_number');
	return $this->_properties['phone'];

}

/**
* @var $this->_properties['mail']
* @param void
* @return String, E-mail
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getMail()
*/
public function getMail(){

	$this->_properties['mail'] = Avada()->settings->get('email_address');
	if (!$this->_properties['mail']) {
		$this->_properties['mail'] = Avada()->settings->get('header_email');
	}
	return $this->_properties['mail'];

}

/**
* @var $this->_properties['address']
* @param void
* @return [] String, address
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#getAddress()
*/
public function getAddress($property = null){

	if (!empty($property) && !is_null($property)) {

		$this->_properties['address'] = Avada()->settings->get('gmap_address');
		$this->_properties['address'] = explode(',',$this->_properties['address'],3);
		switch ($property) {

			case 'streetAddress':
				return $this->_properties['address'][0];
				break;

			case 'postalCode':
				return $this->_properties['address'][1];
				break;

			case 'addressLocality':

				return $this->_properties['address'][2];
				break;

			default:
				$this->_properties['address'] = Avada()->settings->get('gmap_address');
				return $this->_properties['address'];
				break;

		}

	}
	else{

	$this->_properties['address'] = Avada()->settings->get('gmap_address');
	return $this->_properties['address'];

	}

}

// End Class
}
?>