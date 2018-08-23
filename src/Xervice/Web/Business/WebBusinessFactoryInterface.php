<?php
declare(strict_types=1);

namespace Xervice\Web\Business;

use Xervice\Routing\Business\RoutingFacade;
use Xervice\Web\Business\Dependency\Plugin\PluginCollection;
use Xervice\Web\Business\Model\Executor\ExecutionProviderInterface;
use Xervice\Web\Business\Model\Executor\ResponseHandler\ResponseHandlerInterface;
use Xervice\Web\Business\Model\Executor\Validator\ValidatorInterface;
use Xervice\Web\Business\Model\Provider\RouteProviderInterface;

interface WebBusinessFactoryInterface
{
    /**
     * @return \Xervice\Web\Business\Model\Executor\ExecutionProviderInterface
     */
    public function createExecutionProvider(): ExecutionProviderInterface;

    /**
     * @return \Xervice\Web\Business\Model\Executor\Validator\ValidatorInterface
     */
    public function createValidator(): ValidatorInterface;

    /**
     * @return \Xervice\Web\Business\Model\Executor\ResponseHandler\ResponseHandlerInterface
     */
    public function createResponseHandler(): ResponseHandlerInterface;

    /**
     * @return \Xervice\Web\Business\Model\Provider\RouteProviderInterface
     */
    public function createRouteProvider(): RouteProviderInterface;

    /**
     * @return \Xervice\Routing\Business\RoutingFacade
     */
    public function getRoutingFacade(): RoutingFacade;

    /**
     * @return \Xervice\Web\Business\Dependency\Plugin\PluginCollection
     */
    public function getPluginCollection(): PluginCollection;
}