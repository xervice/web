<?php


namespace XerviceTest\Web\Plugin;


use DataProvider\RouteCollectionDataProvider;
use Xervice\Web\Business\Plugin\AbstractWebProviderPlugin;

class TestPlugin extends AbstractWebProviderPlugin
{
    /**
     * @param \DataProvider\RouteCollectionDataProvider $dataProvider
     *
     * @return \DataProvider\RouteCollectionDataProvider
     */
    public function handleRoutes(RouteCollectionDataProvider $dataProvider): RouteCollectionDataProvider
    {
        $dataProvider->addRoute(
            $this->createRoute(
                'MyTest',
                '/tests',
                [
                    'methods' => [
                        'GET'
                    ]
                ],
                function () {
                    return 'TEST';
                }
            )
        );

        return $dataProvider;
    }
}