<?php

namespace Prokl\BitrixFixtureGeneratorBundle\Services\Generators;

use CUser;
use Exception;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\Abstraction\AbstractGenerator;

/**
 * Class UserIdGenerator
 * @package Prokl\BitrixFixtureGeneratorBundle\Services\Generators
 *
 * @since 08.04.2021
 */
class UserIdGenerator extends AbstractGenerator
{
    /**
     * @inheritDoc
     * @throws Exception
     */
    public function generate(?array $payload = null)
    {
        $result = [];

        $by = 'id';
        $order = 'asc';
        $dbResultList = CUser::GetList($by, $order, []);
        while ($arResult = $dbResultList->Fetch()) {
            $result[] = $arResult['ID'];
        }

        return $result[random_int(0, count($result) - 1)];
    }
}
