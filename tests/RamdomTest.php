<?php

namespace PragmaRX\Recovery;

class RamdomTest extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        $this->random = new Random();
    }

    public function testGenerateRandomString()
    {
        $this->assertTrue(strlen($this->random->str(2)) == 2);

        $this->assertTrue(strlen($this->random->str(12)) == 12);
    }

    public function testUppercase()
    {
        $string = $this->random->str(200);

        $this->assertTrue(1 == preg_match('/^[a-zA-Z0-9]{200}+$/', $string));

        $string = $this->random->setLowercase(true)->str(200); // lowercase == false
        var_dump($string);
        var_dump(preg_match('/^[a-zA-Z0-9]{200}+$/', $string));
        var_dump(preg_match('/^[A-Z0-9]{200}+$/', $string));

        $this->assertTrue(0 == preg_match('/^[a-zA-Z0-9]{200}+$/', $string));
//        $this->assertTrue(1 == preg_match('/^[a-z0-9]{200}+$/', $string));
//
//        $string = $this->random->setUppercase(true)->str(200); // lowercase == false
//        $this->assertTrue(0 == preg_match('/^[a-zA-Z0-9]{200}+$/', $string));
//        $this->assertTrue(1 == preg_match('/^[A-Z0-9]{10}+$/', $string));
    }
}
