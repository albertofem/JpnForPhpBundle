<?php

/*
* This file is part of JpnForPhpBundle
*
* (c) Alberto Fernández <albertofem@gmail.com>
*
* For the full copyright and license information, please read
* the LICENSE file that was distributed with this source code.
*/

namespace AFM\Bundle\JpnForPhpBundle\Command;

use JpnForPhp\Analyzer\Analyzer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AnalyzeInspectCommand extends Command
{
    protected function configure()
    {
        $this ->setName('jpnforphp:analyze:inspect')
            ->setDescription('Analyze a given Japanese sentence')
            ->addArgument("sentence", InputArgument::REQUIRED, "Japanese input sentence");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sentence = $input->getArgument("sentence");

        $output->writeln("Analyzing: <info>" .$sentence. "</info>\n");

        $this->inspectSentence($sentence, $output);
    }

    protected function inspectSentence($sentence, OutputInterface $output)
    {
        $totalHiragana = Analyzer::countHiragana($sentence);
        $totalKanji = Analyzer::countKanji($sentence);
        $totalKatakana = Analyzer::countKatakana($sentence);
        $length = Analyzer::length($sentence);
        $hasPunctMark = Analyzer::hasJapanesePunctuationMarks($sentence);
        $totalNonJapanese = $length - ($totalKanji + $totalKatakana + $totalHiragana);

        $output->writeln("Sentence length: <info>" .$length. "</info>");
        $output->writeln("Total hiragana: <info>" .$totalHiragana. "</info>");
        $output->writeln("Total katakana: <info>" .$totalKatakana. "</info>");
        $output->writeln("Total Kanji: <info>" .$totalKanji. "</info>");
        $output->writeln("Total non-japanese characters: <info>". $totalNonJapanese. "</info>");
        $output->writeln("Punctuation marks: <info>" .($hasPunctMark ? "Yes" : "No"). "</info>");
    }
} 
