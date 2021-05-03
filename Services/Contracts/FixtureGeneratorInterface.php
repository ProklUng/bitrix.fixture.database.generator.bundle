<?php

namespace Prokl\BitrixFixtureGeneratorBundle\Services\Contracts;

/**
 * Interface FixtureGeneratorInterface
 * @package Prokl\BitrixFixtureGeneratorBundle\Services\Contracts
 *
 * @since 08.04.2021
 */
interface FixtureGeneratorInterface
{
    /**
     * Сгенерировать фикстуру для поля.
     *
     * @param array|null $payload Нагрузка.
     *
     * @return mixed
     */
    public function generate(?array $payload = null);

    /**
     * @param array $params Задать дополнительные параметры.
     *
     * @return void
     */
    public function setParams(array $params) : void;
}
