<?php


namespace Xervice\Web\Business\Executor\ResponseHandler;


interface ResponseHandlerInterface
{
    /**
     * @param mixed $response
     */
    public function handleResponse($response): void;
}