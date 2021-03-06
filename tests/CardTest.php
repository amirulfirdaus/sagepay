<?php

use dwmsw\sagepay\Card;

class CardTest extends PHPUnit_Framework_TestCase
{

    public function testCardTypeException()
    {
        // New card instance
        $card = new Card();

        try {
            // Card details
            $card->setCardType('NOCARDTYPE');
        } catch (InvalidArgumentException $expected) {
            return;
        }

        $this->fail('Card excepted a random card type');
    }

    public function testCardGettersSetters()
    {
        // New card instance
        $card = new dwmsw\sagepay\Card();
        // Card details
        $card->setCardHolder('Mr D P Doyle');
        $card->setCardType('VISA');
        $card->setCardNumber('4929000000006');
        $card->setStartDate(false);
        $card->setExpiryDate('1216');
        $card->setCV2('123');

        $this->assertEquals('Mr D P Doyle', $card->getCardHolder());
        $this->assertEquals('VISA', $card->getCardType());
        $this->assertEquals('4929000000006', $card->getCardNumber());
        $this->assertEquals(false, $card->getStartDate());
        $this->assertEquals('1216', $card->getExpiryDate());
        $this->assertEquals('123', $card->getCV2());
    }

    public function testCardToken()
    {
        // New card instance
        $card = new dwmsw\sagepay\Card();
        // Card details
        $card->setToken('1234567890abcdefghijklmnopqrstuvwxyz');

        $this->assertTrue($card->hasToken());
        $this->assertEquals('1234567890abcdefghijklmnopqrstuvwxyz', $card->getToken());
    }

    public function testCv2Exception()
    {
        $card = new dwmsw\sagepay\Card();

        try {
            $card->setCV2(12345);
        } catch (InvalidArgumentException $e) {
            return;
        }

        $this->fail('Allowed an input that was too long');
    }

    public function testCardHolderException()
    {
        $card = new dwmsw\sagepay\Card();

        try {
            $card->setCardHolder('Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live.');
        } catch (InvalidArgumentException $e) {
            return;
        }

        $this->fail('Allowed an input that was too long');
    }

    public function testCardNumberException()
    {
        $card = new dwmsw\sagepay\Card();

        try {
            $card->setCardNumber('Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live.');
        } catch (InvalidArgumentException $e) {
            return;
        }

        $this->fail('Allowed an input that was too long');
    }

    public function testStartDateException()
    {
        $card = new dwmsw\sagepay\Card();

        try {
            $card->setStartDate('44555');
        } catch (InvalidArgumentException $e) {
            return;
        }

        $this->fail('Allowed an input that was too formatted incorrectly');
    }

    public function testExpiryDateException()
    {
        $card = new dwmsw\sagepay\Card();

        try {
            $card->setExpiryDate('44555');
        } catch (InvalidArgumentException $e) {
            return;
        }

        $this->fail('Allowed an input that was too formatted incorrectly');
    }

}
