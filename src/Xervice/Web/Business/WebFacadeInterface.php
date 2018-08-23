<?php
declare(strict_types=1);

namespace Xervice\Web\Business;

use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Xervice\Web\Business\WebBusinessFactory getFactory()
 */
interface WebFacadeInterface
{
    public function initWebRouting(): void;

    /**
     * @param string $url
     */
    public function executeUrl(string $url): void;

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function executeRequest(Request $request): void;

    public function execute(): void;
}