<?php

namespace Prokl\BitrixFixtureGeneratorBundle\Services\Generators;

use Exception;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\Abstraction\AbstractGenerator;

/**
 * Class YesNoGenerator
 * @package Prokl\BitrixFixtureGeneratorBundle\Services\Generators
 *
 * @since 10.04.2021
 */
class YesNoGenerator extends AbstractGenerator
{
    /**
     * @inheritDoc
     * @throws Exception
     */
    public function generate(?array $payload = null)
    {
        return mt_rand(0, 1);
    }
}
