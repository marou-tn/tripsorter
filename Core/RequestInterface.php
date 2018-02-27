<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 24/02/2018
 * Time: 17:31
 */

namespace Core;

/**
 * Interface RequestInterface
 * @package Core
 */
interface RequestInterface
{
    /**
     * load request
     * @param null $string
     * @return mixed
     */
    public function load($string = null);
}