<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 24/02/2018
 * Time: 15:38
 */

namespace Controller;


use Core\JsonRequest;

class IndexController
{
    public function index($params = array())
    {
        $request = new JsonRequest();
        $bc_arr = $request->load();
        echo 'doen!';
    }
}