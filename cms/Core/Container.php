<?php

namespace Cms\Core;

class Container
{
    private $initialized = [];

    private $singletons = [];

    private static $i;

    private function __construct()
    {
        // do nothing
    }

    /**
     * @return $this
     */
    public static function getInstance()
    {
        if (null === static::$i) {
            static::$i = new static;
        }
        return static::$i;
    }

    public function get($key)
    {
        if (isset($this->singletons[$key])) {
            return $this->singletons[$key];
        }

        return false;
    }

    public function singleton($key,$concrete)
    {
        $this->singletons[$key] = $concrete($this);

        return $this;
    }
}