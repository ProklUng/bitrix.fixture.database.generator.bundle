<?php

namespace Prokl\BitrixFixtureGeneratorBundle\Services\Generators;

use Bitrix\Main\Type\DateTime;
use Faker\Factory;
use Faker\Generator;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\Abstraction\AbstractGenerator;

/**
 * Class DateGenerator
 * @package Prokl\BitrixFixtureGeneratorBundle\Services\Generators
 *
 * @since 08.04.2021
 */
class DateGenerator extends AbstractGenerator
{
    /**
     * @var Generator $faker Фэйкер.
     */
    private $faker;

    /**
     * HtmlGenerator constructor.
     */
    public function __construct()
    {
        $this->faker = Factory::create('ru_Ru');
    }

    /**
     * @inheritDoc
     */
    public function generate(?array $payload = null)
    {
        return DateTime::createFromUserTime(
            $this->faker->dateTimeThisYear->format('d.m.Y H:i:s')
        );
    }
}
