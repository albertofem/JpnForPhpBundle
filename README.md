JpnForPhpBundle
===============

Integrates jpnforphp library with the Symfony2 framework.

More info: http://mbilbille.github.io/jpnforphp/

Installation
============

Require it in composer:

    composer require albertofem/jpnforphp-bundle dev-master

Install it:

    composer update albertofem/jpnforphp-bundle

Add it to your bundles:

    $bundles = array(
        ...,
        new AFM\Bundle\JpnForPhpBundle\JpnForPhpBundle()
    );

Usage
=====

This bundle aims to provider commands to access the library:

Inspect a sentence
------------------

    php app/console jpnforphp:analyze:inspect 素晴らしいです

Output:

    Analyzing: 素晴らしいです

    Sentence length: 7
    Total hiragana: 5
    Total katakana: 0
    Total Kanji: 2
    Total non-japanese characters: 0
    Punctuation marks: No

Transliteration services
------------------------

Services are defined to access transliterators:

    $hepburn = $this->container->get('jpnforphp.transliterator.romaji.hepburn')
    $hepburn->transliterate('ローマジ で　かいて');

