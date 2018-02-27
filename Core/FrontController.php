<?php
/**
 * Created by PhpStorm.
 * User: jendom
 * Date: 22/02/2018
 * Time: 17:44
 */

namespace Core;
use Config\Config;
use Controller;

/**
 * Class FrontController dispatch request, instance controller and run actions
 * @implements FrontControllerInterface
 * @package Core
 */
class FrontController implements FrontControllerInterface
{
    const DEFAULT_NAMESPACE = "\Controller\\";
    const DEFAULT_CONTROLLER = "IndexController";
    const DEFAULT_ACTION     = "index";

    protected $controller    = self::DEFAULT_NAMESPACE . self::DEFAULT_CONTROLLER;
    protected $action        = self::DEFAULT_ACTION;
    protected $params        = array();
    protected $basePath      = "";

    /**
     * FrontController constructor.
     * @param array $options
     */
    public function __construct(array $options = array()) {
        $this->setBasePath();
        if (empty($options)) {
            $this->parseUri();
        }
        else {
            if (isset($options["Controller"])) {
                $this->setController($options["Controller"]);
            }
            if (isset($options["action"])) {
                $this->setAction($options["action"]);
            }
            if (isset($options["params"])) {
                $this->setParams($options["params"]);
            }
        }
    }

    /**
     * set base path
     * @return $this
     */
    protected function setBasePath() {
        $config = Config::getInstance();
        $base = $config->get('app.base_url');
        $version = $config->get('version');

        $this->basePath = $base.'/'.$version.'';
        return $this;
    }

    /**
     * parse uri to get controller, action and params
     */
    protected function parseUri() {
        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        if (strpos($path, $this->basePath) === 0) {
            $path = substr($path, strlen($this->basePath)+1);
        }
        @list($controller, $action, $params) = explode("/", $path, 3);
        if (!empty($controller)) {
            $this->setController($controller);
        }
        if (!empty($action)) {
            $this->setAction($action);
        }
        if (!empty($params)) {
            $this->setParams(explode("/", $params));
        }
    }

    /**
     * set controller
     * @param $controller
     * @return $this
     */
    public function setController($controller) {
        $controller = ucfirst(strtolower($controller)) . "Controller";
        $controller = self::DEFAULT_NAMESPACE . $controller;
        if (!class_exists($controller)) {
            throw new InvalidArgumentException("The action Controller '$controller' has not been defined.");
        }
        $this->controller = $controller;
        return $this;
    }

    /**
     * set action
     * @param $action
     * @return $this
     */
    public function setAction($action) {
        $reflector = new ReflectionClass($this->controller);
        if (!$reflector->hasMethod($action)) {
            throw new InvalidArgumentException("The Controller action '$action' has been not defined.");
        }
        $this->action = $action;
        return $this;
    }

    /**
     * set params
     * @param array $params
     * @return $this
     */
    public function setParams(array $params) {
        $this->params = $params;
        return $this;
    }

    /**
     * run controller->action(params)
     */
    public function run() {
        call_user_func_array(array(new $this->controller(), $this->action), $this->params);
    }
}