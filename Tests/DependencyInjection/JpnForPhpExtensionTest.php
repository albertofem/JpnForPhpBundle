<?php

/*
* This file is part of JpnForPhpBundle
*
* (c) Alberto Fernández <albertofem@gmail.com>
*
* For the full copyright and license information, please read
* the LICENSE file that was distributed with this source code.
*/

namespace AFM\Bundle\JpnForPhpBundle\Tests\DependencyInjection;

use AFM\Bundle\JpnForPhpBundle\Tests\AppKernel;
use JpnForPhp\Transliterator\Romaji;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JpnForPhpExtensionTest extends WebTestCase
{
    public function testRomajiServicesAreSetted()
    {
        $romanizations = array(
            'hepburn',
            'kunrei',
            'nihon',
            'wapuro'
        );

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

    protected static function createKernel(array $options = array())
    {
        return new AppKernel("test", true);
    }
} 