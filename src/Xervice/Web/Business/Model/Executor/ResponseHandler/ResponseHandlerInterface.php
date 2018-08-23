<?php


namespace Xervice\Web\Business\Model\Executor\ResponseHandler;


interface ResponseHandlerInterface
{
    /**
     * @param mixed $response
     */
    public function handleResponse($response): void;
}