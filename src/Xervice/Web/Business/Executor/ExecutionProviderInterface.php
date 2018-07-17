<?php

namespace Xervice\Web\Business\Executor;

interface ExecutionProviderInterface
{
    /**
     * @param string $url
     *
     * @throws \Xervice\Web\Business\Exception\WebExeption
     */
    public function executeUrl(string $url): void;
}