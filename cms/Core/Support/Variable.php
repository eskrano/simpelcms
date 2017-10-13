<?php

namespace Cms\Core\Support;

class Variable implements \JsonSerializable
{
    private $value;

    /**
     * Variable constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->value;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        return $this->value;
    }

    /**
     * @return Dumper
     */
    public function dump()
    {
        return (new Dumper())->dump($this->value);
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->value;
    }

    /**
     * @param $value
     * @return $this
     */
    public function set($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function isArray()
    {
        return is_array($this->value);
    }

    /**
     * @return bool
     */
    public function isObject()
    {
        return is_object($this->value);
    }

    /**
     * @return bool
     */
    public function isString()
    {
        return is_string($this->value);
    }
}