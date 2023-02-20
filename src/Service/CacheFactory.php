<?php

namespace BjyAuthorize\Service;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\Cache\Service\StorageAdapterFactoryInterface;

/**
 * Factory for building the cache storage
 *
 * @author Christian Bergau <cbergau86@gmail.com>
 */
class CacheFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @see \Laminas\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $storageFactory = $container->get(StorageAdapterFactoryInterface::class);
        return $storageFactory->createFromArrayConfiguration($container->get('BjyAuthorize\Config')['cache_options']);
    }
}
