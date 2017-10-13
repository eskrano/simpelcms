<?php

namespace Cms\Core\Response;

use Cms\Core\Response\Collection\HtmlResponse;
use Cms\Core\Response\Collection\JsonResponse;
use Cms\Core\Response\Collection\NullResponse;

class BaseResponse
{
    private $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function toResponse()
    {

        if (is_array($this->response)) {
            return new JsonResponse($this->response);
        }

        if (is_object($this->response) && $this->checkObject()) {
            return new JsonResponse($this->response->toResponse());
        }

        if (is_string($this->response)) {
            return new HtmlResponse($this->response);
        }

        // todo add detect if template renderer.


        return new NullResponse;

    }

    private function checkObject()
    {
        $reflect = new \ReflectionObject($this->response);
        return $reflect->hasMethod('toResponse');
    }
}