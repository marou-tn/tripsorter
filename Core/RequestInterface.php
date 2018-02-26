<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 24/02/2018
 * Time: 17:31
 */

namespace Core;


interface RequestInterface
{
    public function load($string = null);
}