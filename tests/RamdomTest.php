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

        $this->assertTrue(strlen($this->random->numeric()->str(12)) == 12);
    }

    public function testUppercase()
    {
        $string = $this->random->str(200);

        $this->assertTrue(1 == preg_match('/^[a-zA-Z0-9]{200}+$/', $string));

        $string = $this->random->lowercase()->str(200); // lowercase == false
        $this->assertFalse(preg_match('/^[A-Z0-9]{200}+$/', $string) == 1);
        $this->assertTrue(preg_match('/^[a-z0-9]{200}+$/', $string) == 1);
        $this->assertTrue(preg_match('/^[a-zA-Z0-9]{200}+$/', $string) == 1);

        $string = $this->random->uppercase()->str(200); // lowercase == false
        $this->assertFalse(preg_match('/^[a-z0-9]{200}+$/', $string) == 1);
        $this->assertTrue(preg_match('/^[A-Z0-9]{200}+$/', $string) == 1);
        $this->assertTrue(preg_match('/^[a-zA-Z0-9]{200}+$/', $string) == 1);

        $string = $this->random->mixedcase()->str(200); // lowercase == false
        $this->assertTrue(preg_match('/^[a-zA-Z0-9]{200}+$/', $string) == 1);
    }

    public function testNumeric()
    {
        $string = $this->random->numeric()->str(200); // lowercase == false

        $this->assertFalse(preg_match('/^[A-Za-z]{200}+$/', $string) == 1);
        $this->assertTrue(preg_match('/^[0-9]{200}+$/', $string) == 1);

        $string = $this->random->alpha()->str(200); // lowercase == false
        $this->assertTrue(preg_match('/^[a-zA-Z0-9]{200}+$/', $string) == 1);
    }
}
