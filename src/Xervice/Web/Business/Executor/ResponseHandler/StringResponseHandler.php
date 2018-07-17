<?php


namespace Xervice\Web\Business\Executor\ResponseHandler;


class StringResponseHandler implements ResponseHandlerInterface
{
    /**
     * @param callable $controller
     */
    public function handleResponse(callable $controller): void
    {
        echo $controller();
    }

}