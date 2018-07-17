<?php


namespace Xervice\Web;


use Xervice\Core\Dependency\DependencyProviderInterface;
use Xervice\Core\Dependency\Provider\AbstractProvider;
use Xervice\Web\Business\Plugin\PluginCollection;

/**
 * @method \Xervice\Core\Locator\Locator getLocator()
 */
class WebDependencyProvider extends AbstractProvider
{
    public const ROUTE_PROVIDER_COLLECTION = 'route.provider.collection';

    public const ROUTING_FACADE = 'routing.facade';

    /**
     * @param \Xervice\Core\Dependency\DependencyProviderInterface $dependencyProvider
     */
    public function handleDependencies(DependencyProviderInterface $dependencyProvider): void
    {
        $dependencyProvider[self::ROUTE_PROVIDER_COLLECTION] = function () {
            return new PluginCollection(
                $this->getRouteProvider()
            );
        };

        $dependencyProvider[self::ROUTING_FACADE] = function (DependencyProviderInterface $dependencyProvider) {
            return $dependencyProvider->getLocator()->routing()->facade();
        };
    }

    /**
     * @return \Xervice\Web\Business\Plugin\WebProviderPluginInterface[]
     */
    protected function getRouteProvider(): array
    {
        return [];
    }
}