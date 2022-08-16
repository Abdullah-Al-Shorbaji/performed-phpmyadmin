<?php

declare(strict_types=1);

namespace JsonMapper\SymfonyBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class JsonMapperExtension extends Extension
{
    /**
     * @return void
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../../Resources/config'));

        $loader->load('services.xml');
    }
}
