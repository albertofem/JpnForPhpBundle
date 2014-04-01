<?php

/*
 * Copyright (c) 2014 Certadia, SL
 * All rights reserved
 */

namespace AFM\Bundle\JpnForPhpBundle\Tests\DependencyInjection;

use AFM\Bundle\JpnForPhpBundle\Tests\AppKernel;
use JpnForPhp\Transliterator\Romaji;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JpnForPhpExtensionTest extends WebTestCase
{
    public function testRomajiServicesAreSetted()
    {
        $romanizations = [
            'hepburn',
            'kunrei',
            'nihon',
            'wapuro'
        ];

        $container = self::createClient()->getContainer();

        foreach($romanizations as $romanization)
        {
            $service = $container->get('jpnforphp.transliterator.romaji.' . $romanization);
            $this->assertTrue($service instanceof Romaji);
        }
    }

    protected static function getPhpUnitXmlDir()
    {
        return __DIR__ . '/../../';
    }

    protected static function createKernel($options)
    {
        return new AppKernel("test", true);
    }
} 