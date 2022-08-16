<?php

declare(strict_types=1);

namespace JsonMapper\SymfonyBundle\Tests\Unit;

use JsonMapper\SymfonyBundle\JsonMapperBundle;
use JsonMapper\SymfonyBundle\DependencyInjection\JsonMapperExtension;
use PHPUnit\Framework\TestCase;

class BundleTest extends TestCase
{
    /**
     * @covers \JsonMapper\SymfonyBundle\JsonMapperBundle
     */
    public function testBundleReturnsCorrectExtension(): void
    {
        $bundle = new JsonMapperBundle();

        $extension = $bundle->getContainerExtension();

        self::assertInstanceOf(JsonMapperExtension::class, $extension);
    }
}
