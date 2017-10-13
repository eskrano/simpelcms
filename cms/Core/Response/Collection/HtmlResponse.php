<?php

namespace Cms\Core\Response\Collection;

class HtmlResponse
{
    private $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function handle()
    {
        echo $this->response;

        return;
    }
}