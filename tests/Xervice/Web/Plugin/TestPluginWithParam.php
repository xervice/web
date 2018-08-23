<?php


namespace XerviceTest\Web\Plugin;


use DataProvider\RouteCollectionDataProvider;
use Xervice\Web\Business\Dependency\Plugin\AbstractWebProviderPlugin;

class TestPluginWithParam extends AbstractWebProviderPlugin
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
                '/testparam/{param}',
                [
                    'methods' => [
                        'GET'
                    ]
                ],
                function (array $request) {
                    return sprintf(
                        'TEST(%s)',
                        $request['param']
                    );
                }
            )
        );

        return $dataProvider;
    }
}