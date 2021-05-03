<?php

namespace Prokl\BitrixFixtureGeneratorBundle\Samples\Fixtures;

use Prokl\BitrixFixtureGeneratorBundle\Services\Annotations\FieldParams;
use Prokl\BitrixFixtureGeneratorBundle\Services\Contracts\FixtureInterface;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\BaseOptionGenerator;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\RandomLinkElementGenerator;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\RandomLinkSectionGenerator;

/**
 * Class ExampleHighloadFixture
 * @package Prokl\BitrixFixtureGeneratorBundle\Samples\Fixtures
 *
 * @since 11.04.2021
 */
class ExampleHighloadFixture implements FixtureInterface
{
    /**
     * @inheritDoc
     */
    public function id() : string
    {
        return 'ExampleHighload';
    }

    /**
     * @inheritDoc
     * @FieldParams(
     *    params={
     *     "UF_STRING"= { "length"=25 },
     *     "UF_OPTIONS"= { "options"= { "Опция 1", "Опция 2", "Опция 3" }}
     *    }
     * )
     */
    public function fixture() : array
    {
        return [
            'UF_STRING' => 'bitrix_fixture_generator.short_string_generator',
            'UF_OPTIONS' => BaseOptionGenerator::class,
            'UF_LINK_SECTION' => RandomLinkSectionGenerator::class,
            'UF_LINK_ELEMENT' => RandomLinkElementGenerator::class,
        ];
    }
}
