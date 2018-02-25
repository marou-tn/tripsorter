<?php
/**
 * Created by PhpStorm.
 * User: jendom
 * Date: 21/02/2018
 * Time: 15:35
 */

namespace Config;

class Local implements ConfigInterface
{
    private $config = [
        'version' => 'v1',
        'app' => [
            'url' => 'loacalhost',
            'base_url' => 'tripsorter/api',
        ]
    ];

    /**
     * @return array all Config
     */
    public function getAll()
    {
        return $this->config;
    }

    /**
     * @param $key_string config keys key1.key2.key3 ...
     * @return array|mixed sub conf
     */
    public function get($key_string)
    {
        $keys = explode('.', $key_string);
        $sub_conf = $this->config;
        foreach ($keys as $key)
        {
            $sub_conf = $sub_conf[$key];
        }

        return $sub_conf;
    }

}