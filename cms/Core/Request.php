<?php

namespace Cms\Core;

class Request
{
    private $stack;

    public function __construct(array $stack)
    {
        $this->stack = new RequestStack($stack);
    }

    public function get($key, $default = null)
    {
        return $this->stack->get($key, $default);
    }
}