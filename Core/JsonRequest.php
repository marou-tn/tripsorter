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
        $respense = null;
        if (isset($_POST['BoardingCards'])) {
            $respense = json_decode($_POST['BoardingCards']);
        }
        return $respense;
    }
}