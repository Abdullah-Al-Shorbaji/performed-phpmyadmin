<?php

declare(strict_types=1);

namespace JsonMapper\SymfonyBundle\Tests\Unit\DependencyInjection;

use JsonMapper\JsonMapper;
use JsonMapper\JsonMapperFactory;
use JsonMapper\SymfonyBundle\DependencyInjection\JsonMapperExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class JsonMapperExtensionTest extends TestCase
{
    /**
     * @covers \JsonMapper\SymfonyBundle\DependencyInjection\JsonMapperExtension
     */
    public function testLoadWillSetDefinitions(): void
    {
        $jsonMapperExtension = new JsonMapperExtension();
        $container = new ContainerBuilder();

        $jsonMapperExtension->load([], $container);

        self::assertTrue($container->has(JsonMapperFactory::class));
        self::assertTrue($container->has(JsonMapper::class));
    }
}
