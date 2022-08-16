<?php

declare(strict_types=1);

namespace JsonMapper\SymfonyBundle;

use JsonMapper\SymfonyBundle\DependencyInjection\JsonMapperExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class JsonMapperBundle extends Bundle
{
    /**
     * @return JsonMapperExtension
     */
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new JsonMapperExtension();
    }
}
