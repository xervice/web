<?php


namespace Xervice\Web\Business\Executor;


use Symfony\Component\HttpFoundation\Request;
use Xervice\Routing\RoutingFacade;
use Xervice\Web\Business\Executor\ResponseHandler\ResponseHandlerInterface;
use Xervice\Web\Business\Executor\Validator\ValidatorInterface;

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
     * @var \Xervice\Web\Business\Executor\Validator\ValidatorInterface
     */
    private $validator;

    /**
     * ExecutionProvider constructor.
     *
     * @param \Xervice\Routing\RoutingFacade $routeFacade
     * @param \Xervice\Web\Business\Executor\ResponseHandler\ResponseHandlerInterface $responseHandler
     * @param \Xervice\Web\Business\Executor\Validator\ValidatorInterface $validator
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


    /**
     * @throws \Xervice\Web\Business\Exception\WebExeption
     */
    public function execute(): void
    {
        $this->executeRequest(
            $this->getRequest()
        );
    }

    /**
     * @param string $url
     *
     * @throws \Xervice\Web\Business\Exception\WebExeption
     */
    public function executeUrl(string $url): void
    {
        $this->handleData(
            $this->routeFacade->matchUrl($url)
        );
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @throws \Xervice\Web\Business\Exception\WebExeption
     */
    public function executeRequest(Request $request)
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
     * @param $executionData
     *
     * @throws \Xervice\Web\Business\Exception\WebExeption
     */
    private function handleData($executionData): void
    {
        $this->validator->validateExecutionData($executionData);
        $this->responseHandler->handleResponse($executionData);
    }
}