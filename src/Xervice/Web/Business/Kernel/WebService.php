<?php


namespace Xervice\Web\Business\Kernel;


use Xervice\Core\Locator\AbstractWithLocator;
use Xervice\Kernel\Business\Service\ServiceInterface;
use Xervice\Kernel\Business\Service\ServiceProviderInterface;

/**
 * @method \Xervice\Web\WebFacade getFacade()
 */
class WebService extends AbstractWithLocator implements ServiceInterface
{
    /**
     * @param \Xervice\Kernel\Business\Service\ServiceProviderInterface $serviceProvider
     *
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     */
    public function boot(ServiceProviderInterface $serviceProvider): void
    {
        $this->getFacade()->initWebRouting();
    }

    /**
     * @param \Xervice\Kernel\Business\Service\ServiceProviderInterface $serviceProvider
     *
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     * @throws \Xervice\Web\Business\Exception\WebExeption
     */
    public function execute(ServiceProviderInterface $serviceProvider): void
    {
        $this->getFacade()->execute();
    }

}