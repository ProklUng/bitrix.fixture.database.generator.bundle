<?php

namespace Prokl\BitrixFixtureGeneratorBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class BitrixDatabaseExtension
 * @package Prokl\BitrixFixtureGeneratorBundle\DependencyInjection
 *
 * @since 08.04.2021
 */
class BitrixFixtureGeneratorBundleExtension extends Extension
{
    private const DIR_CONFIG = '/../Resources/config';

    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container) : void
    {
        if (!$_ENV['DEBUG']) {
            return;
        }

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter(
            'bitrix_fixture_generator_fixture_path',
            $config['fixture_path']
        );

        $container->setParameter(
            'bitrix_fixture_generator_test_project',
            $config['structure_project']
        );

        $container->setParameter(
            'bitrix_fixture_generator_ignore_errors',
            $config['ignore_errors']
        );

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . self::DIR_CONFIG)
        );

        $loader->load('services.yaml');
        $loader->load('generators.yaml');
        $loader->load('commands.yaml');
    }

    /**
     * @inheritDoc
     */
    public function getAlias() : string
    {
        return 'bitrix-fixture-generator';
    }
}
