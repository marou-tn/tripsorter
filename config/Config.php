<?php
/**
 * Created by PhpStorm.
 * User: jendom
 * Date: 21/02/2018
 * Time: 15:48
 */

namespace config;

class Config
{
    private function __construct(){}
    private function __clone(){}

    public static function getInstance()
    {
        $class = ucfirst(strtolower(trim($GLOBALS['env'])));

        $instance = new Local();
        var_dump($instance);
        die;
        return $instance;
    }

}