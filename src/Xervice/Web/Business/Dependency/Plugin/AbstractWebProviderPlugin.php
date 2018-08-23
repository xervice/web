<?php
declare(strict_types=1);

namespace Xervice\Web\Business\Dependency\Plugin;


use DataProvider\RouteDataProvider;

abstract class AbstractWebProviderPlugin implements WebProviderPluginInterface
{
    /**
     * @param string $name
     * @param string $path
     * @param array $options
     * @param callable $callable
     *
     * @return \DataProvider\RouteDataProvider
     */
    public function createRoute(
        string $name,
        string $path,
        array $options,
        callable $callable
    ): RouteDataProvider
    {
        $route = new RouteDataProvider();

        $route
            ->setName($name)
            ->setPath($path)
            ->setDefaults(
                [
                    '_controller' => $callable
                ]
            )
            ->setMethods(
                $options['methods'] ?? []
            );

        return $route;
    }
}