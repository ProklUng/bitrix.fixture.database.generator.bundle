<?php

namespace Prokl\BitrixFixtureGeneratorBundle\Services\Generators\Abstraction;

use Prokl\BitrixFixtureGeneratorBundle\Services\Contracts\FixtureGeneratorInterface;

/**
 * Class AbstractGenerator
 * @package Prokl\BitrixFixtureGeneratorBundle\Services\Generators\Abstraction
 *
 * @since 10.04.2021
 */
abstract class AbstractGenerator implements FixtureGeneratorInterface
{
    /**
     * @var array $params Дополнительные runtime параметры.
     */
    protected $params = [];

    /**
     * @inheritDoc
     */
    abstract public function generate(?array $payload = null);

    /**
     * @inheritDoc
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }
}