<?php
declare(strict_types=1);

namespace Xervice\Web;


use Xervice\Core\Business\Model\Dependency\DependencyContainerInterface;
use Xervice\Core\Business\Model\Dependency\Provider\AbstractDependencyProvider;
use Xervice\Web\Business\Dependency\Plugin\PluginCollection;

class WebDependencyProvider extends AbstractDependencyProvider
{
    public const ROUTE_PROVIDER_COLLECTION = 'route.provider.collection';

    public const ROUTING_FACADE = 'routing.facade';

    /**
     * @param DependencyContainerInterface $container
     *
     * @return DependencyContainerInterface
     */
    public function handleDependencies(DependencyContainerInterface $container): DependencyContainerInterface
    {
        $container = $this->addPluginCollection($container);
        $container = $this->addRoutingFacade($container);

        return $container;
    }

    /**
     * @return \Xervice\Web\Business\Dependency\Plugin\WebProviderPluginInterface[]
     */
    protected function getRouteProvider(): array
    {
        return [];
    }

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    protected function addPluginCollection(
        DependencyContainerInterface $container
    ): DependencyContainerInterface {
        $container[self::ROUTE_PROVIDER_COLLECTION] = function () {
            return new PluginCollection(
                $this->getRouteProvider()
            );
        };
        return $container;
    }

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    protected function addRoutingFacade(
        DependencyContainerInterface $container
    ): DependencyContainerInterface {
        $container[self::ROUTING_FACADE] = function (DependencyContainerInterface $container) {
            return $container->getLocator()->routing()->facade();
        };
        return $container;
    }
}
