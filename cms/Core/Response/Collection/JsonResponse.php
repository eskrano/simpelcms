<?php

namespace Cms\Core\Response\Collection;

class JsonResponse
{
    private $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function handle()
    {
        header('Content-Type: application/json');

        echo json_encode($this->response);
    }
}