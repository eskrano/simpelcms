<?php

namespace Cms\Core;

use Cms\Exception\PageNotFoundException;

class Routing
{
    private $requestUri;

    public function __construct($requestUri)
    {
        $this->prepareRequestUri($requestUri);
    }

    /**
     * @param $uri
     * @throws PageNotFoundException
     */
    private function prepareRequestUri($uri)
    {
        $parts = explode('/', $uri);

        if (count($parts) === 0) {
            $this->requestUri = [
                'action' => 'home@index'
            ];
        } else {
            $this->requestUri = [
                'action' => sprintf("%s@%s",
                    $parts[0], $parts[1]
                ),
            ];
        }

    }

    public function getAction()
    {
        return explode('@', $this->requestUri['action']);
    }
}