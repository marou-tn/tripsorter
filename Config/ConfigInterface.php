<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 24/02/2018
 * Time: 15:36
 */

namespace Config;

/**
 * Interface ConfigInterface
 * @package Config
 */
interface ConfigInterface
{
    /**
     * get config variable by key
     * @param $key
     * @return mixed
     */
    public function get($key);

    /**
     * get all config array
     * @return array
     */
    public function getAll();
}