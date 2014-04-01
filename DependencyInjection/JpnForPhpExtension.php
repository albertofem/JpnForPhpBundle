<?php

/*
* This file is part of JpnForPhpBundle
*
* (c) Alberto Fernández <albertofem@gmail.com>
*
* For the full copyright and license information, please read
* the LICENSE file that was distributed with this source code.
*/

namespace AFM\Bundle\JpnForPhpBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * {@inheritDoc}
 */
class JpnForPhpExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}