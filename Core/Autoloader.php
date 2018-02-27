<?php
/**
 * Created by PhpStorm.
 * User: jendom
 * Date: 20/02/2018
 * Time: 10:46
 */

namespace Core;

/**
 * Class Autoloader
 * @package Core
 */
class Autoloader
{
    public static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class){
        try{
            $parts = preg_split('#\\\#', $class);

            // get last item
            $className = array_pop($parts);

            // create class path
            $path = implode(DIRECTORY_SEPARATOR, $parts);
            $file = $className.'.php';

            $filepath = DOCROOT. $path .''.DIRECTORY_SEPARATOR.$file;

            if (file_exists($filepath)) {
                require $filepath;
            } else {
                if (strpos($className, 'Controller')) {
                    http_response_code(404);
                    echo ("404 page not found");
                } else {
                    throw new \Exception("$filepath was not found");
                }
            }
        }catch (Exception $e){
            throw new Exception("Unable to load $className. ".$e->getMessage());
        }
    }
}