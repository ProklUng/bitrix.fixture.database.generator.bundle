<?php

namespace Prokl\BitrixFixtureGeneratorBundle\Services\Generators;

use Exception;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\Abstraction\AbstractGenerator;

/**
 * Class BaseOptionGenerator
 * @package Prokl\BitrixFixtureGeneratorBundle\Services\Generators
 *
 * @since 11.04.2021
 */
class BaseOptionGenerator extends AbstractGenerator
{
    /**
     * @inheritDoc
     * @throws Exception
     */
    public function generate(?array $payload = null)
    {
        if ($payload === null || !array_key_exists('options', $payload['params'])) {
            return null;
        }

        $key = random_int(0, count($payload['params']['options']) - 1);

        return $payload['params']['options'][$key];
    }
}
