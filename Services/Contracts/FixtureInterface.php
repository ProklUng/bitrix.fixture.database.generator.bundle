<?php

namespace Prokl\BitrixFixtureGeneratorBundle\Services\Contracts;

/**
 * Interface FixtureInterface
 * Контакт описания фикстур в виде классов.
 * @package Prokl\BitrixFixtureGeneratorBundle\Services\Contracts
 *
 * @since 11.04.2021
 */
interface FixtureInterface
{
    /**
     * ID фикстуры (тип инфоблока . код инфоблока).
     *
     * @return string
     */
    public function id() : string;

    /**
     * Фикстура.
     *
     * @return array
     */
    public function fixture() : array;
}