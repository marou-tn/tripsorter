<?php
/**
 * Created by PhpStorm.
 * User: jendom
 * Date: 20/02/2018
 * Time: 11:09
 */

define('DOCROOT', __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR);
define('COREPATH', dirname(__DIR__).DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR);

//print_r(DOCROOT);die;

require COREPATH.'autoloader.php';
class_alias('Tripsorter\\Core\\Autoloader', 'Autoloader');

Autoloader::register();

$GLOBALS['env'] = getenv('TRIPSORT_ENV');

use config\Config;
use config\Local;
use Tripsorter\core;

try {
//    var_dump(class_exists("Tripsorter\Config\Config"));die;
    $version = Config::getInstance();//->get('version');
    print_r($version);die;

    Router::route('api/'.$version.'/(\w+)/(\w+)', function($category, $id){
        print $category . ':' . $id;
    });
    Router::execute($_SERVER['REQUEST_URI']);
}Catch(Exception $e){
    print_r($e);
}