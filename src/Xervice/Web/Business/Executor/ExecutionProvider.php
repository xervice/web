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
     * @throws \Xervice\Web\Business\Exception\WebExeption
     */
    public function execute(): void
    {
        $this->executeUrl(
            sprintf(
                '%s',
                $this->getPath()
            )
        );
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
        $this->responseHandler->handleResponse($executionData);
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

    /**
     * @return string
     */
    private function getPath(): string
    {
        $path = '/';
        if (isset($_SERVER['REQUEST_URI'])) {
            $path = parse_url($_SERVER['REQUEST_URI']);
            $path = $path['path'] ?? '/';
        }

        return $path;
    }
}