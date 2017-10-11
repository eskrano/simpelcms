<?php

namespace Cms\Core\Response\Collection;

class HtmlResponse
{
    private $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function __invoke()
    {
        echo $this->response;

        return;
    }
}