<?php


namespace Xervice\Web;


use Xervice\Core\Facade\AbstractFacade;

/**
 * @method \Xervice\Web\WebFactory getFactory()
 */
class WebFacade extends AbstractFacade
{
    public function initWebRouting(): void
    {
        $this->getFactory()->createRouteProvider()->provideRoutings();
    }

    /**
     * @param string $url
     *
     * @throws \Xervice\Web\Business\Exception\WebExeption
     */
    public function executeUrl(string $url): void
    {
        $this->getFactory()->createExecutionProvider()->executeUrl($url);
    }
}