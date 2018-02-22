<?php
/**
 * Created by PhpStorm.
 * User: jendom
 * Date: 21/02/2018
 * Time: 15:48
 */

namespace Tripsorter\Config;

class Config
{
    private function __construct(){}
    private function __clone(){}

    public static function getInstance()
    {
        $class = ucfirst(trim($GLOBALS['env']));

        return new $class.'php';
    }

}