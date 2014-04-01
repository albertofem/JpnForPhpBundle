<?php

/*
* This file is part of JpnForPhpBundle
*
* (c) Alberto Fernández <albertofem@gmail.com>
*
* For the full copyright and license information, please read
* the LICENSE file that was distributed with this source code.
*/

namespace AFM\Bundle\JpnForPhpBundle\Tests;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
    /**
     * {@inheritDoc}
     */
    public function registerBundles()
    {
        return array(
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \AFM\Bundle\JpnForPhpBundle\JpnForPhpBundle()
        );
    }

    /**
     * {@inheritDoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/Resources/config_test.yml');
    }
} 