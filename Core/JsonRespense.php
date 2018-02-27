<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 25/02/2018
 * Time: 17:24
 */

namespace Core;

/**
 * Class JsonRespense
 * @package Core
 */
class JsonRespense implements RespenseInterface
{
    protected $response = [];

    /**
     * @return string json encode final response
     */
    public function load()
    {
        return json_encode($this->response);
    }

    /**
     * add items to final response
     * @param $item
     */
    public function add($item)
    {
        $this->response[] = $item;
    }

}