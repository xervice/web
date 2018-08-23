<?php


namespace Xervice\Web\Business;


use Xervice\Core\Business\Model\Factory\AbstractBusinessFactory;
use Xervice\Routing\Business\RoutingFacade;
use Xervice\Web\Business\Dependency\Plugin\PluginCollection;
use Xervice\Web\Business\Model\Executor\ExecutionProvider;
use Xervice\Web\Business\Model\Executor\ExecutionProviderInterface;
use Xervice\Web\Business\Model\Executor\ResponseHandler\ResponseHandlerInterface;
use Xervice\Web\Business\Model\Executor\ResponseHandler\StringResponseHandler;
use Xervice\Web\Business\Model\Executor\Validator\Validator;
use Xervice\Web\Business\Model\Executor\Validator\ValidatorInterface;
use Xervice\Web\Business\Model\Provider\RouteProvider;
use Xervice\Web\Business\Model\Provider\RouteProviderInterface;
use Xervice\Web\WebDependencyProvider;

class WebBusinessFactory extends AbstractBusinessFactory implements WebBusinessFactoryInterface
{
    /**
     * @return \Xervice\Web\Business\Model\Executor\ExecutionProviderInterface
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
     * @return \Xervice\Web\Business\Model\Executor\Validator\ValidatorInterface
     */
    public function createValidator(): ValidatorInterface
    {
        return new Validator();
    }

    /**
     * @return \Xervice\Web\Business\Model\Executor\ResponseHandler\ResponseHandlerInterface
     */
    public function createResponseHandler(): ResponseHandlerInterface
    {
        return new StringResponseHandler();
    }

    /**
     * @return \Xervice\Web\Business\Model\Provider\RouteProviderInterface
     */
    public function createRouteProvider(): RouteProviderInterface
    {
        return new RouteProvider(
            $this->getPluginCollection(),
            $this->getRoutingFacade()
        );
    }

    /**
     * @return \Xervice\Routing\Business\RoutingFacade
     */
    public function getRoutingFacade(): RoutingFacade
    {
        return $this->getDependency(WebDependencyProvider::ROUTING_FACADE);
    }

    /**
     * @return \Xervice\Web\Business\Dependency\Plugin\PluginCollection
     */
    public function getPluginCollection(): PluginCollection
    {
        return $this->getDependency(WebDependencyProvider::ROUTE_PROVIDER_COLLECTION);
    }
}