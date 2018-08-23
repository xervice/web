<?php

namespace Xervice\Web\Business\Model\Executor;

use Symfony\Component\HttpFoundation\Request;

interface ExecutionProviderInterface
{
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