<?php
declare(strict_types=1);

namespace Xervice\Web\Communication\Plugin;

use Xervice\Core\Plugin\AbstractCommunicationPlugin;
use Xervice\Kernel\Business\Model\Service\ServiceProviderInterface;
use Xervice\Kernel\Business\Plugin\BootInterface;
use Xervice\Kernel\Business\Plugin\ExecuteInterface;


/**
 * @method \Xervice\Web\Business\WebFacade getFacade()
 */
class WebService extends AbstractCommunicationPlugin implements BootInterface, ExecuteInterface
{
    /**
     * @param \Xervice\Kernel\Business\Model\Service\ServiceProviderInterface $serviceProvider
     *
     */
    public function boot(ServiceProviderInterface $serviceProvider): void
    {
        $this->getFacade()->initWebRouting();
    }

    /**
     * @param \Xervice\Kernel\Business\Model\Service\ServiceProviderInterface $serviceProvider
     */
    public function execute(ServiceProviderInterface $serviceProvider): void
    {
        $this->getFacade()->execute();
    }

}