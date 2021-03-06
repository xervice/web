<?php

namespace Xervice\Web\Business\Model\Executor\Validator;

interface ValidatorInterface
{
    /**
     * @param array $executionData
     *
     * @throws \Xervice\Web\Business\Exception\WebExeption
     */
    public function validateExecutionData(array $executionData): void;
}