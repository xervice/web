<?php


namespace Xervice\Web\Business\Model\Executor\ResponseHandler;


class StringResponseHandler implements ResponseHandlerInterface
{
    /**
     * @param mixed $response
     */
    public function handleResponse($response): void
    {
        echo $response['_controller']($response);
    }

}