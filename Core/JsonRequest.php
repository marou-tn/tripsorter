<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 24/02/2018
 * Time: 17:32
 */

namespace Core;

/**
 * Class JsonRequest
 * @package Core
 */
class JsonRequest implements RequestInterface
{
    /**
     * get and decode json request
     * @param null $string param name
     * @return mixed|null
     */
    public function load($string = null)
    {
        $respense = null;
        if ($string) {
            if (isset($_POST[$string])) {
                $respense = json_decode($_POST[$string]);
            }
        }else {
            $respense = json_decode($_POST);
        }

        return $respense;
    }
}