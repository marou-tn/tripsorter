<?php
/**
 * Created by PhpStorm.
 * User: jendom
 * Date: 22/02/2018
 * Time: 17:43
 */

namespace Core;


interface FrontControllerInterface
{
    public function setController($controller);
    public function setAction($action);
    public function setParams(array $params);
    public function run();
}