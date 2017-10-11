<?php

namespace Cms\Core\Response;

use Cms\Core\Response\Collection\JsonResponse;

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

        // todo add detect if template renderer.
    }

    private function checkObject()
    {
        $reflect = new \ReflectionObject($this->response);
        return $reflect->hasMethod('toResponse');
    }
}