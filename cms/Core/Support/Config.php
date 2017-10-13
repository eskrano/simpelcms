<?php

namespace Cms\Core\Support;

class Config
{
    private $path;

    protected $collection;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * Resolve config files.
     */
    public function resolve()
    {
        foreach (glob(sprintf("%s/*.php", $this->path)) as $file) {
            $config = require_once $file;

            foreach ($config as $key => $value) {
                $this->collection[$key] = $value;
            }
        }
    }

    /**
     * @param $key
     * @param null $default
     * @return null
     */
    public function get($key, $default = null)
    {
        return isset($this->collection[$key]) ? $this->collection[$key] : $default;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value)
    {
        $this->collection[$key] = $value;

        return $this;
    }

}