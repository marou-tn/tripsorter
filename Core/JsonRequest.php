<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 24/02/2018
 * Time: 17:32
 */

namespace Core;


class JsonRequest implements RequestInterface
{
    public function load()
    {
        return json_decode(file_get_contents("php://input"), true);
    }
}