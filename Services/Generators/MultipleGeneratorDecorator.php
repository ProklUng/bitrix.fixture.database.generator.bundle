<?php

namespace Prokl\BitrixFixtureGeneratorBundle\Services\Generators;

use Exception;
use Prokl\BitrixFixtureGeneratorBundle\Services\Contracts\FixtureGeneratorInterface;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\Abstraction\AbstractGenerator;

/**
 * Class MultipleGeneratorDecorator
 * @package Prokl\BitrixFixtureGeneratorBundle\Services\Generators
 *
 * @since 09.04.2021
 */
class MultipleGeneratorDecorator extends AbstractGenerator
{
    /**
     * @var FixtureGeneratorInterface $decoratedService
     */
    private $decoratedService;

    /**
     * @var integer $count Сколько значений генерировать.
     */
    private $count;

    /**
     * MultipleGeneratorDecorator constructor.
     *
     * @param FixtureGeneratorInterface $decoratedService Декорируемый генератор.
     * @param integer                   $count            Сколько значений генерировать.
     */
    public function __construct(FixtureGeneratorInterface $decoratedService, int $count = 3)
    {
        $this->decoratedService = $decoratedService;
        $this->count = $count;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function generate(?array $payload = null)
    {
        $result = [];
        for ($i = 0; $i <= $this->count; $i++) {
             $result[] = $this->decoratedService->generate($payload);
        }

        return $result;
    }
}
