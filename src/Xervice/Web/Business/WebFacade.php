<?php


namespace Xervice\Web\Business;


use Symfony\Component\HttpFoundation\Request;
use Xervice\Core\Business\Model\Facade\AbstractFacade;

/**
 * @method \Xervice\Web\Business\WebBusinessFactory getFactory()
 */
class WebFacade extends AbstractFacade implements WebFacadeInterface
{
    public function initWebRouting(): void
    {
        $this->getFactory()->createRouteProvider()->provideRoutings();
    }

    /**
     * @param string $url
     */
    public function executeUrl(string $url): void
    {
        $this->getFactory()->createExecutionProvider()->executeUrl($url);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function executeRequest(Request $request): void
    {
        $this->getFactory()->createExecutionProvider()->executeRequest($request);
    }

    public function execute(): void
    {
        $this->getFactory()->createExecutionProvider()->execute();
    }
}