<?php


namespace Xervice\Web\Business\Executor\ResponseHandler;


interface ResponseHandlerInterface
{
    /**
     * @param callable $controller
     */
    public function handleResponse(callable $controller): void;
}