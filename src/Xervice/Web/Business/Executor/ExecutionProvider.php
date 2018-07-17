<?php


namespace Xervice\Web\Business\Executor;


use Xervice\Routing\RoutingFacade;
use Xervice\Web\Business\Exception\WebExeption;
use Xervice\Web\Business\Executor\ResponseHandler\ResponseHandlerInterface;

class ExecutionProvider implements ExecutionProviderInterface
{
    /**
     * @var \Xervice\Routing\RoutingFacade
     */
    private $routeFacade;

    /**
     * @var \Xervice\Web\Business\Executor\ResponseHandler\ResponseHandlerInterface
     */
    private $responseHandler;

    /**
     * ExecutionProvider constructor.
     *
     * @param \Xervice\Routing\RoutingFacade $routeFacade
     * @param \Xervice\Web\Business\Executor\ResponseHandler\ResponseHandlerInterface $responseHandler
     */
    public function __construct(
        RoutingFacade $routeFacade,
        ResponseHandlerInterface $responseHandler
    ) {
        $this->routeFacade = $routeFacade;
        $this->responseHandler = $responseHandler;
    }

    /**
     * @param string $url
     *
     * @throws \Xervice\Web\Business\Exception\WebExeption
     */
    public function executeUrl(string $url): void
    {
        $executionData = $this->routeFacade->matchUrl($url);
        $this->validateExecutionData($executionData);
        $this->responseHandler->handleResponse($executionData['_controller']);
    }

    /**
     * @param array $executionData
     *
     * @throws \Xervice\Web\Business\Exception\WebExeption
     */
    private function validateExecutionData(array $executionData): void
    {
        if (!isset($executionData['_controller'])) {
            throw new WebExeption(
                sprintf(
                    'No callable given for route %s',
                    $executionData['_route']
                )
            );
        }
    }
}