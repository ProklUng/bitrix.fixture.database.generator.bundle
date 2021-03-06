<?php

namespace Prokl\BitrixFixtureGeneratorBundle\Services\Generators;

use CIBlockElement;
use CIBlockResult;
use Exception;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\Abstraction\AbstractGenerator;
use Prokl\BitrixFixtureGeneratorBundle\Services\Iblocks\IblockProperties;
use RuntimeException;

/**
 * Class LinkElementGenerator
 * @package Prokl\BitrixFixtureGeneratorBundle\Services\Generators
 *
 * @since 09.04.2021
 */
class LinkElementGenerator extends AbstractGenerator
{
    /**
     * @var IblockProperties $propertiesManager Менеджер свойств инфоблоков.
     */
    private $propertiesManager;

    /**
     * @var CIBlockElement $ciblockElement Битриксовый CIBlockElement.
     */
    private $ciblockElement;

    /**
     * LinkElementGenerator constructor.
     *
     * @param IblockProperties $propertiesManager Менеджер свойств инфоблоков.
     * @param CIBlockElement   $ciblockElement    Битриксовый CIBlockElement.
     */
    public function __construct(
        IblockProperties $propertiesManager,
        CIBlockElement $ciblockElement
    ) {
        $this->propertiesManager = $propertiesManager;
        $this->ciblockElement = $ciblockElement;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function generate(?array $payload = null)
    {
        if ($payload === null) {
            throw new RuntimeException(
                'Для поля типа привязка к элементам указывать ключ поля обязательно.'
            );
        }

        $fieldData = $this->propertiesManager->getProperty(
            $payload['iblock_id'],
            $payload['field'],
        );

        $linkedIblock = $fieldData['LINK_IBLOCK_ID'] ?? null;
        if (!$linkedIblock) {
            return null;
        }

        /** @var CIBlockResult $result */
        $result = $this->ciblockElement::GetList(
            ['RAND' => 'ASC'],
            [
                'IBLOCK_ID' => $linkedIblock,
                'ACTIVE' => 'Y',
            ],
            false,
            false,
            [
                'ID',
            ]
        );

        if ($ob = $result->GetNext()) {
            return $ob['ID'];
        }

       return 0;
    }
}
