<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 24/02/2018
 * Time: 15:36
 */

namespace Config;


interface ConfigInterface
{
    public function get($key);
    public function getAll();
}