<?php

namespace Prokl\BitrixFixtureGeneratorBundle\Services\Annotations;

/**
 * Class FieldParams
 * @package Prokl\BitrixFixtureGeneratorBundle\Services\Annotations
 *
 * @since 11.04.2021
 *
 * @Annotation
 */
class FieldParams
{
    /**
     * @var array $params
     */
    public $params = [];

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }
}