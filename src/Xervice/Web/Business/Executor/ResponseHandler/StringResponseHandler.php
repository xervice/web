<?php


namespace Xervice\Web\Business\Executor\ResponseHandler;


class StringResponseHandler implements ResponseHandlerInterface
{
    /**
     * @param $response
     */
    public function handleResponse($response): void
    {
        echo $response['_controller']($response);
    }

}