<?php

/**
 * Standart CMS functions
 */

if (!function_exists('_dump')) {
    /**
     * @param array ...$data
     * @return \Cms\Core\Support\Dumper
     */
    function _dump(...$data)
    {
        return (new \Cms\Core\Support\Dumper())->dump($data);
    }
}

if (!function_exists('variable')) {
    /**
     * @param $var
     * @return \Cms\Core\Support\Variable
     */
    function variable($var)
    {
        return new \Cms\Core\Support\Variable($var);
    }
}

if (!function_exists('config')) {
    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    function config($key, $default = null)
    {
        $config = \Cms\Core\Container::getInstance()->get('config');
        return $config->get($key, $default);
    }
}

if (!function_exists('app')) {
    /**
     * @param $name
     * @return bool|mixed
     */
    function app($name)
    {
        return \Cms\Core\Container::getInstance()->get($name);
    }
}