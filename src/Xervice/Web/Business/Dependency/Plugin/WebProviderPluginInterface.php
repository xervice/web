<?php
declare(strict_types=1);

namespace Xervice\Web\Business\Dependency\Plugin;


use DataProvider\RouteCollectionDataProvider;

interface WebProviderPluginInterface
{
    /**
     * @param \DataProvider\RouteCollectionDataProvider $dataProvider
     *
     * @return \DataProvider\RouteCollectionDataProvider
     */
    public function handleRoutes(RouteCollectionDataProvider $dataProvider): RouteCollectionDataProvider;
}