<?php

namespace Prokl\BitrixFixtureGeneratorBundle\Samples\Fixtures;

use Prokl\BitrixFixtureGeneratorBundle\Services\Annotations\FieldParams;
use Prokl\BitrixFixtureGeneratorBundle\Services\Contracts\FixtureInterface;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\HtmlGenerator;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\ImageIdGenerator;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\UserIdGenerator;

/**
 * Class TableDaNewsFixture
 * @package Prokl\BitrixFixtureGeneratorBundle\Samples\Fixtures
 *
 * @since 11.04.2021
 */
class TableDaNewsFixture implements FixtureInterface
{
    /**
     * @inheritDoc
     */
    public function id() : string {
        return 'd_ah_news';
    }

    /**
     * @inheritDoc
     *
     * @FieldParams(
     *    params={
     *     "TITLE"= { "length"=20 },
     *    }
     * )
     */
    public function fixture() : array {
        return [
            'IMAGE' => ImageIdGenerator::class, // Сервис, помеченный тэгом fixture_generator.item.
            'CREATED_BY' => UserIdGenerator::class,
            'MODIFIED_BY' => UserIdGenerator::class,
            'TEXT' => HtmlGenerator::class,
            'TEXT_TEXT_TYPE' => 'html',
            'TITLE' => 'bitrix_fixture_generator.title_generator', // Alias сервиса
        ];
    }
}