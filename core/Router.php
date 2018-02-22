<?php
/**
 * Created by PhpStorm.
 * User: jendom
 * Date: 20/02/2018
 * Time: 12:14
 */

namespace Tripsorter\Core;


class Router
{
    private static $routes = array();

    private function __construct() {}
    private function __clone() {}

    /**
     * @param $pattern url format
     * @param $callback to trait url params
     */
    public static function route($pattern, $callback) {
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        self::$routes[$pattern] = $callback;
    }

    /**
     * @param $url srtring
     * @return mixed
     */
    public static function execute($url) {
        foreach (self::$routes as $pattern => $callback) {
            if (preg_match($pattern, $url, $params)) {
                array_shift($params);
                return call_user_func_array($callback, array_values($params));
            }
        }
    }
}