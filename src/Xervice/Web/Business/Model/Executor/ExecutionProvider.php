<?php


namespace Xervice\Web\Business\Model\Executor;


use Symfony\Component\HttpFoundation\Request;
use Xervice\Routing\Business\RoutingFacade;
use Xervice\Web\Business\Model\Executor\ResponseHandler\ResponseHandlerInterface;
use Xervice\Web\Business\Model\Executor\Validator\ValidatorInterface;

class ExecutionProvider implements ExecutionProviderInterface
{
    /**
     * @var \Xervice\Routing\Business\RoutingFacade
     */
    private $routeFacade;

    /**
     * @var \Xervice\Web\Business\Model\Executor\ResponseHandler\ResponseHandlerInterface
     */
    private $responseHandler;

    /**
     * @var \Xervice\Web\Business\Model\Executor\Validator\ValidatorInterface
     */
    private $validator;

    /**
     * ExecutionProvider constructor.
     *
     * @param \Xervice\Routing\Business\RoutingFacade $routeFacade
     * @param \Xervice\Web\Business\Model\Executor\ResponseHandler\ResponseHandlerInterface $responseHandler
     * @param \Xervice\Web\Business\Model\Executor\Validator\ValidatorInterface $validator
     */
    public function __construct(
        RoutingFacade $routeFacade,
        ResponseHandlerInterface $responseHandler,
        ValidatorInterface $validator
    ) {
        $this->routeFacade = $routeFacade;
        $this->responseHandler = $responseHandler;
        $this->validator = $validator;
    }

    public function execute(): void
    {
        $this->executeRequest(
            $this->getRequest()
        );
    }

    /**
     * @param string $url
     */
    public function executeUrl(string $url): void
    {
        $this->handleData(
            $this->routeFacade->matchUrl($url)
        );
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function executeRequest(Request $request): void
    {
        $this->handleData(
            $this->routeFacade->matchRequest($request)
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    private function getRequest(): Request
    {
        return Request::createFromGlobals();
    }

    /**
     * @param array $executionData
     */
    private function handleData(array $executionData): void
    {
        $this->validator->validateExecutionData($executionData);
        $this->responseHandler->handleResponse($executionData);
    }
}