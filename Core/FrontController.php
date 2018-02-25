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


class FrontController implements FrontControllerInterface
{
    const DEFAULT_NAMESPACE = "\Controller\\";
    const DEFAULT_CONTROLLER = "IndexController";
    const DEFAULT_ACTION     = "index";

    protected $controller    = self::DEFAULT_NAMESPACE . self::DEFAULT_CONTROLLER;
    protected $action        = self::DEFAULT_ACTION;
    protected $params        = array();
    protected $basePath      = "";

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
    
    protected function setBasePath() {
        $config = Config::getInstance();
        $base = $config->get('app.base_url');
        $version = $config->get('version');

//        $this->basePath = $base.'/'.$version.'/';
        $this->basePath = "tripsorter/public";
        return $this;
    }

    protected function parseUri() {
        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
//        $path = preg_replace('/[^a-zA-Z0-9]/', "", $path);
        if (strpos($path, $this->basePath) === 0) {
            $path = substr($path, strlen($this->basePath));
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

    public function setController($controller) {
        $controller = ucfirst(strtolower($controller)) . "Controller";
        $controller = self::DEFAULT_NAMESPACE . $controller;
        if (!class_exists($controller)) {
            throw new InvalidArgumentException(
                "The action Controller '$controller' has not been defined.");
        }
        $this->controller = $controller;
        return $this;
    }

    public function setAction($action) {
        $reflector = new ReflectionClass($this->controller);
        if (!$reflector->hasMethod($action)) {
            throw new InvalidArgumentException(
                "The Controller action '$action' has been not defined.");
        }
        $this->action = $action;
        return $this;
    }

    public function setParams(array $params) {
        $this->params = $params;
        return $this;
    }

    public function run() {
        call_user_func_array(array(new $this->controller(), $this->action), $this->params);
    }
}