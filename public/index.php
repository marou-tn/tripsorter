<?php
/**
 * Created by PhpStorm.
 * User: jendom
 * Date: 20/02/2018
 * Time: 11:09
 */

define('DOCROOT', __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR);
define('COREPATH', dirname(__DIR__).DIRECTORY_SEPARATOR.'Core'.DIRECTORY_SEPARATOR);

//print_r(DOCROOT);
//print_r(COREPATH);

require COREPATH.'autoloader.php';
class_alias('Core\\Autoloader', 'Autoloader');

Autoloader::register();

$GLOBALS['env'] = getenv('TRIPSORT_ENV');

use Core\FrontController;

try {
    $frontController = new FrontController();
    $frontController->run();

}Catch(Exception $e){
    print_r($e);
}