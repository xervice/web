<?php

namespace XerviceTest\Web;

use Xervice\Core\Business\Model\Locator\Dynamic\Business\DynamicBusinessLocator;
use Xervice\Core\Business\Model\Locator\Locator;
use Xervice\Web\Business\Dependency\Plugin\PluginCollection;
use Xervice\Web\Business\Model\Provider\RouteProvider;
use XerviceTest\Web\Plugin\TestPlugin;
use XerviceTest\Web\Plugin\TestPluginWithParam;

/**
 * @method \Xervice\Web\WebFactory getFactory()
 * @method \Xervice\Web\WebFacade getFacade()
 */
class IntegrationTest extends \Codeception\Test\Unit
{
    use DynamicBusinessLocator;

    /**
     * @group Xervice
     * @group Web
     * @group Integration
     */
    public function testWebProvider()
    {
        $pluginCollection = new PluginCollection(
            [
                new TestPlugin()
            ]
        );

        $routeProvider = new RouteProvider(
            $pluginCollection,
            $this->getRoutingFacade()
        );

        $routeProvider->provideRoutings();

        ob_start();
        $this->getFacade()->executeUrl('/tests');
        $response = ob_get_contents();
        ob_end_clean();

        $this->assertEquals(
            'TEST',
            $response
        );
    }

    /**
     * @group Xervice
     * @group Web
     * @group Integration
     */
    public function testWebProviderWithParam()
    {
        $pluginCollection = new PluginCollection(
            [
                new TestPluginWithParam()
            ]
        );

        $routeProvider = new RouteProvider(
            $pluginCollection,
            $this->getRoutingFacade()
        );

        $routeProvider->provideRoutings();

        ob_start();
        $this->getFacade()->executeUrl('/testparam/unit');
        $response = ob_get_contents();
        ob_end_clean();

        $this->assertEquals(
            'TEST(unit)',
            $response
        );
    }

    /**
     * @return mixed
     */
    private function getRoutingFacade()
    {
        return Locator::getInstance()->routing()->facade();
    }
}