<?php
/**
 * Created by PhpStorm.
 * User: jendom
 * Date: 22/02/2018
 * Time: 17:43
 */

namespace Core;

/**
 * Interface FrontControllerInterface
 * @package Core
 */
interface FrontControllerInterface
{
    /**
     * set controller
     * @param $controller
     * @return mixed
     */
    public function setController($controller);

    /**
     * set action
     * @param $action
     * @return mixed
     */
    public function setAction($action);

    /**
     * set params
     * @param array $params
     * @return mixed
     */
    public function setParams(array $params);

    /**
     * run controller->action(params)
     * @return mixed
     */
    public function run();
}