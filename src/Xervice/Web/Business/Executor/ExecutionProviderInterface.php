<?php

namespace Xervice\Web\Business\Executor;

use Symfony\Component\HttpFoundation\Request;

interface ExecutionProviderInterface
{
    /**
     * @param string $url
     *
     * @throws \Xervice\Web\Business\Exception\WebExeption
     */
    public function executeUrl(string $url): void;

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @throws \Xervice\Web\Business\Exception\WebExeption
     */
    public function executeRequest(Request $request): void;

    /**
     * @throws \Xervice\Web\Business\Exception\WebExeption
     */
    public function execute(): void;
}