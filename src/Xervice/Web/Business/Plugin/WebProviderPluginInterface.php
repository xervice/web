<?php


namespace Xervice\Web\Business\Plugin;


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