<?php

namespace Prokl\BitrixFixtureGeneratorBundle;

use Prokl\BitrixFixtureGeneratorBundle\DependencyInjection\BitrixFixtureGeneratorBundleExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class BitrixDatabaseBundle
 * @package Prokl\BitrixFixtureGeneratorBundle
 *
 * @since 08.04.2021
 */
class BitrixFixtureGeneratorBundle extends Bundle
{
   /**
   * @inheritDoc
   */
    public function getContainerExtension()
    {
        if ($this->extension === null) {
            $this->extension = new BitrixFixtureGeneratorBundleExtension();
        }

        return $this->extension;
    }
}
