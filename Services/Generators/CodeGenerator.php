<?php

namespace Prokl\BitrixFixtureGeneratorBundle\Services\Generators;

use Exception;
use Faker\Factory;
use Faker\Generator;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\Abstraction\AbstractGenerator;

/**
 * Class CodeGenerator
 * @package Prokl\BitrixFixtureGeneratorBundle\Services\Generators
 *
 * @since 08.04.2021
 */
class CodeGenerator extends AbstractGenerator
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
     * @throws Exception
     */
    public function generate(?array $payload = null)
    {
        $slug = $this->faker->slug(6);
        if (strlen($slug) > 255) {
            $slug = substr($slug, 0, 255);
        }

        return str_replace(' ', '-', $slug);
    }
}
