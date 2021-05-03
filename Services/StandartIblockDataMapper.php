<?php

namespace Prokl\BitrixFixtureGeneratorBundle\Services;

use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\CodeGenerator;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\DateGenerator;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\ImageGenerator;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\UserIdGenerator;

/**
 * Class StandartIblockDataMapper
 * @package Prokl\BitrixFixtureGeneratorBundle\Services
 *
 * @since 08.04.2021
 */
class StandartIblockDataMapper
{
    /**
     * @var string[] $map
     */
    private $map = [
        'PREVIEW_PICTURE' => 'bitrix_fixture_generator.preview_picture_generator',
        'DETAIL_PICTURE' => 'bitrix_fixture_generator.detail_picture_generator', // Сервис, помеченный тэгом fixture_generator.item.
        'ACTIVE_FROM' => DateGenerator::class,
        'CREATED_BY' => UserIdGenerator::class,
        'MODIFIED_BY' => UserIdGenerator::class,
        'PREVIEW_TEXT' => 'bitrix_fixture_generator.preview_text_generator',
        'PREVIEW_TEXT_TYPE' => 'html',
        'DETAIL_TEXT' => 'bitrix_fixture_generator.detail_text_generator',
        'DETAIL_TEXT_TYPE' => 'html',
        'NAME' => 'bitrix_fixture_generator.name_generator', // Alias сервиса
        'CODE' => CodeGenerator::class,
    ];

    /**
     * @var string[] $sectionMap
     */
    private $sectionMap = [
        'NAME' => 'bitrix_fixture_generator.name_generator', // Alias сервиса
        'CODE' => CodeGenerator::class,
        'PICTURE' => 'bitrix_fixture_generator.preview_picture_generator',
        'DETAIL_PICTURE' => 'bitrix_fixture_generator.detail_picture_generator',
        'DESCRIPTION' => 'bitrix_fixture_generator.preview_text_generator',
        'DESCRIPTION_TYPE' => 'html',
        'MODIFIED_BY' => UserIdGenerator::class,
    ];

    /**
     * @return string[]
     */
    public function getSectionMap(): array
    {
        return $this->sectionMap;
    }

    /**
     * @return string[]
     */
    public function getMap() : array
    {
        return $this->map;
    }
}
