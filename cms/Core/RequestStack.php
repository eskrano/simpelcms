<?php

namespace Cms\Core;

class RequestStack
{

    private $payload;

    public function __construct($payload)
    {
        $this->payload = $payload;
    }


    public function get($key, $default = null)
    {
        return $this->getFromPayload('get', $key) ?: $default;
    }

    private function getFromPayload($key, $subkey)
    {
        if (! isset($this->payload[$key][$subkey])) {
            return false;
        }

        return $this->payload[$key][$subkey];
    }
}