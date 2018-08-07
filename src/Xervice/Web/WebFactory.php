<?php


namespace Xervice\Web;


use Xervice\Core\Factory\AbstractFactory;
use Xervice\Routing\RoutingFacade;
use Xervice\Web\Business\Executor\ExecutionProvider;
use Xervice\Web\Business\Executor\ExecutionProviderInterface;
use Xervice\Web\Business\Executor\ResponseHandler\ResponseHandlerInterface;
use Xervice\Web\Business\Executor\ResponseHandler\StringResponseHandler;
use Xervice\Web\Business\Executor\Validator\Validator;
use Xervice\Web\Business\Executor\Validator\ValidatorInterface;
use Xervice\Web\Business\Plugin\PluginCollection;
use Xervice\Web\Business\Provider\RouteProvider;
use Xervice\Web\Business\Provider\RouteProviderInterface;

class WebFactory extends AbstractFactory
{
    /**
     * @return \Xervice\Web\Business\Executor\ExecutionProviderInterface
     */
    public function createExecutionProvider(): ExecutionProviderInterface
    {
        return new ExecutionProvider(
            $this->getRoutingFacade(),
            $this->createResponseHandler(),
            $this->createValidator()
        );
    }

    /**
     * @return \Xervice\Web\Business\Executor\Validator\ValidatorInterface
     */
    public function createValidator(): ValidatorInterface
    {
        return new Validator();
    }

    /**
     * @return \Xervice\Web\Business\Executor\ResponseHandler\ResponseHandlerInterface
     */
    public function createResponseHandler(): ResponseHandlerInterface
    {
        return new StringResponseHandler();
    }

    /**
     * @return \Xervice\Web\Business\Provider\RouteProvider
     */
    public function createRouteProvider(): RouteProviderInterface
    {
        return new RouteProvider(
            $this->getPluginCollection(),
            $this->getRoutingFacade()
        );
    }

    /**
     * @return \Xervice\Routing\RoutingFacade
     */
    public function getRoutingFacade(): RoutingFacade
    {
        return $this->getDependency(WebDependencyProvider::ROUTING_FACADE);
    }

    /**
     * @return \Xervice\Web\Business\Plugin\PluginCollection
     */
    public function getPluginCollection(): PluginCollection
    {
        return $this->getDependency(WebDependencyProvider::ROUTE_PROVIDER_COLLECTION);
    }
}