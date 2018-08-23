<?php


namespace Xervice\Web\Business\Model\Executor\Validator;



use Xervice\Web\Business\Exception\WebExeption;

class Validator implements ValidatorInterface
{
    /**
     * @param array $executionData
     *
     * @throws \Xervice\Web\Business\Exception\WebExeption
     */
    public function validateExecutionData(array $executionData): void
    {
        if (!isset($executionData['_controller'])) {
            throw new WebExeption(
                sprintf(
                    'No callable given for route %s',
                    $executionData['_route']
                )
            );
        }
    }
}