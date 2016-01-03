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

namespace PrestigeSEO;
use \PrestigeSEO\classes\Schema;
use \PrestigeSEO\classes\Wordpress;
use \PrestigeSEO\classes\Cache;

class PrestigeSEO {

    /**
     * @var void [] Classes Objects
     */
	private $_objects = array(

							'schema' 	=> '',
							'Wordpress' => '',
							'cache'		=> ''
	);

public function __construct(){

}

public function __set($property,$value){

	$this->$property = $value;
	return $this->$property;

}

public function __get($property){

	return $this->$property;

}

/**
* @var $class, get_template_directory()
* @param $class
* @return String, Class path
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#PSEO_autoload()
*/
public static function PSEO_autoload($class){

    if (strpos($class, __NAMESPACE__ . '\\') === 0){
        $class = str_replace(__NAMESPACE__ . '\\', '', $class);
        $class = str_replace('\\', '/', $class);
        # Uses Wordpress function
        require get_template_directory(). '/package/' .__NAMESPACE__. '/' . $class . '.class.php';
    }

}

/**
* @var PSEO_autoload()
* @param viod
* @return Class
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#PSEO_register()
*/
public static function PSEO_register(){

    spl_autoload_register(array(__CLASS__, 'PSEO_autoload'));

}

/**
* @var PSEO_register()
* @param viod
* @return Object
* @see https://github.com/Viaprestige/PrestigeSEO/wiki/developer/#PSEO_run()
*/
public static function PSEO_run(){

	# No Declaration before registring function !
	self::PSEO_register();
	
	// Cache instance
	$cache = new Cache();

	// Check id cach exists
	if (!$cache->cacheExists()) {
		// Start PrestigeSEO
		$schema = new Schema();
	}

}
# End Class
}
?>