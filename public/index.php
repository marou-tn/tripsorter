<?php
/**
 * Created by PhpStorm.
 * User: jendom
 * Date: 20/02/2018
 * Time: 11:09
 */

define('DOCROOT', __DIR__.DIRECTORY_SEPARATOR);
define('COREPATH', dirname(__DIR__).'/core'.DIRECTORY_SEPARATOR);

require COREPATH.'classes'.DIRECTORY_SEPARATOR.'autoloader.php';
class_alias('Tripsorter\\Core\\Autoloader', 'Autoloader');