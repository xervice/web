<?php


namespace Xervice\Web\Business\Provider;


use DataProvider\RouteCollectionDataProvider;
use Xervice\Routing\RoutingFacade;
use Xervice\Web\Business\Plugin\PluginCollection;

class RouteProvider implements RouteProviderInterface
{
    /**
     * @var PluginCollection
     */
    private $pluginCollection;

    /**
     * @var \Xervice\Routing\RoutingFacade
     */
    private $routingFacade;

    /**
     * RouteProvider constructor.
     *
     * @param \Xervice\Web\Business\Plugin\PluginCollection $pluginCollection
     * @param \Xervice\Routing\RoutingFacade $routingFacade
     */
    public function __construct(
        PluginCollection $pluginCollection,
        RoutingFacade $routingFacade
    ) {
        $this->pluginCollection = $pluginCollection;
        $this->routingFacade = $routingFacade;
    }

    public function provideRoutings(): void
    {
        $routeCollection = new RouteCollectionDataProvider();

        foreach ($this->pluginCollection as $provider) {
            $routeCollection = $provider->handleRoutes($routeCollection);
        }

        $this->routingFacade->addRoutes($routeCollection);
    }

}