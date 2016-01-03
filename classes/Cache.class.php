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

class Cache extends Wordpress {

    /**
     * @var [] Global settings
     */
	private $_properties = array(

						'dir'			=> '/cache/wp-rocket/',
						'cachefile'		=> ''

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
* @var $this->_properties['dir']
* @param void
* @return Boolean, Is cache exists
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#_cacheExists()
*/
public function cacheExists(){

	$this->_properties['dir'] 		= dirname(dirname(parent::getTemplatedirectory())).$this->_properties['dir'];
	$this->_properties['cachefile'] = scandir($this->_properties['dir']);
	if (file_exists($this->_properties['dir']) && isset($this->_properties['cachefile'][2])) {
		return true;
	}
	else{
		return false;
	}
}

// End Class
}
?>