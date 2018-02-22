<?php
/**
 * Created by PhpStorm.
 * User: jendom
 * Date: 20/02/2018
 * Time: 10:46
 */

namespace Tripsorter\Core;

class Autoloader
{
    public static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class){
        try{
            // var_dump($class); => App\Tester\Test

            // on explose notre variable $class par \
            $parts = preg_split('#\\\#', $class);

            // on extrait le dernier element
            $className = array_pop($parts);

            // on créé le chemin vers la classe
            // on utilise DS car plus propre et meilleure portabilité entre les différents systèmes (windows/linux)

            $path = implode(DIRECTORY_SEPARATOR, $parts);
            $file = $className.'.php';

            $filepath = DOCROOT. $path .''.DIRECTORY_SEPARATOR.$file;

            // var_dump($filepath); => C:\xampp\htdocs\Labs\Eloyas\app\tester\Test.php
            //
            require $filepath;
        }catch (Exception $e){
            throw new Exception("Unable to load $className. ".$e->getMessage());
        }
    }
}