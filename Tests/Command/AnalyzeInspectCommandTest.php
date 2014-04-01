<?php

/*
 * Copyright (c) 2014 Certadia, SL
 * All rights reserved
 */

namespace AFM\Bundle\JpnForPhpBundle\Tests\Command;

use AFM\Bundle\JpnForPhpBundle\Tests\AppKernel;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\StreamOutput;

class AnalyzeInspectCommandTest extends WebTestCase
{
    public function testAnalyzeSampleSentence()
    {
        $sentence = "素晴らしいです";

        $client = self::createClient();
        $output = $this->runCommand($client, "jpnforphp:analyze:inspect " .$sentence);
        $output = explode("\n", $output);

        $this->assertContains('Analyzing: ' .$sentence, $output[0]);
        $this->assertContains('Sentence length: 7', $output[2]);
        $this->assertContains('Total hiragana: 5', $output[3]);
        $this->assertContains('Total katakana: 0', $output[4]);
        $this->assertContains('Total Kanji: 2', $output[5]);
        $this->assertContains('Total non-japanese characters: 0', $output[6]);
        $this->assertContains('Punctuation marks: No', $output[7]);
    }

    protected static function getPhpUnitXmlDir()
    {
        return __DIR__ . '/../../';
    }

    protected static function createKernel($options)
    {
        return new AppKernel("test", true);
    }

    public function runCommand(Client $client, $command)
    {
        $application = new Application($client->getKernel());
        $application->setAutoExit(false);

        $fp = tmpfile();
        $input = new StringInput($command);
        $output = new StreamOutput($fp);

        $application->run($input, $output);

        fseek($fp, 0);
        $output = '';
        while (!feof($fp)) {
            $output = fread($fp, 4096);
        }
        fclose($fp);

        return $output;
    }
} 