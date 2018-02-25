<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 25/02/2018
 * Time: 17:24
 */

namespace Core;


class JsonRespense implements RespenseInterface
{
    protected $respense = [];
    public function load()
    {
        return json_encode($this->respense);
    }

    public function add($item)
    {
        $this->respense[] = $item;
    }

}