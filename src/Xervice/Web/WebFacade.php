<?php


namespace Xervice\Web;


use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @throws \Xervice\Web\Business\Exception\WebExeption
     */
    public function executeRequest(Request $request): void
    {
        $this->getFactory()->createExecutionProvider()->executeRequest($request);
    }

    /**
     * @throws \Xervice\Web\Business\Exception\WebExeption
     */
    public function execute(): void
    {
        $this->getFactory()->createExecutionProvider()->execute();
    }
}