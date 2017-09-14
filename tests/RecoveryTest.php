<?php

namespace PragmaRX\Recovery;

class RecoveryTest extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        $this->recovery = new Recovery(new Random());
    }

    public function testGenerateArray()
    {
        $this->assertTrue(is_array($this->recovery->toArray()));
    }

    public function testGetSome()
    {
        $this->assertCount(2, $this->recovery->setCount(2)->toArray());
    }

    public function testGetJson()
    {
        $this->assertTrue(
            is_array(
                json_decode($this->recovery->setCount(3)->setBlocks(3)->toJson())
            )
        );
    }

    public function testChangeCount()
    {
        $this->assertCount(2, $this->recovery->setCount(2)->toArray());

        $this->assertCount(3, $this->recovery->setCount(3)->setBlocks(7)->setChars(16)->toArray());

        $this->assertCount(3, $this->recovery->toArray());
    }

    public function testElementCount()
    {
        $result = $this->recovery->setCount(3)->setBlocks(7)->setChars(16)->toArray();

        $this->assertCount(3, $result);

        $this->assertCount(7, $result[0]);

        $this->assertTrue(strlen($result[0][0]) == 16);
    }

    public function testNumeric()
    {
        $result = $this->recovery->numeric()->setCount(3)->setBlocks(7)->setChars(64)->toArray()[0][0];
        $this->assertFalse(preg_match('/^[a-zA-Z]{64}+$/', $result) == 1);
        $this->assertTrue(preg_match('/^[0-9]{64}+$/', $result) == 1);

        $result = $this->recovery->alpha()->setCount(3)->setBlocks(7)->setChars(64)->toArray()[0][0];
        $this->assertTrue(preg_match('/^[a-zA-Z0-9]{64}+$/', $result) == 1);
        $this->assertFalse(preg_match('/^[0-9]{64}+$/', $result) == 1);
    }

    public function testUpperLower()
    {
        $result = $this->recovery->uppercase()->setCount(3)->setBlocks(7)->setChars(64)->toArray()[0][0];
        $this->assertTrue(preg_match('/^[A-Z0-9]{64}+$/', $result) == 1);
        $this->assertFalse(preg_match('/^[a-z0-9]{64}+$/', $result) == 1);

        $result = $this->recovery->lowercase()->setCount(3)->setBlocks(7)->setChars(64)->toArray()[0][0];
        $this->assertFalse(preg_match('/^[A-Z0-9]{64}+$/', $result) == 1);
        $this->assertTrue(preg_match('/^[a-z0-9]{64}+$/', $result) == 1);

        $result = $this->recovery->mixedcase()->setCount(3)->setBlocks(7)->setChars(64)->toArray()[0][0];
        $this->assertTrue(preg_match('/^[a-zA-Z0-9]{64}+$/', $result) == 1);
        $this->assertFalse(preg_match('/^[A-Z0-9]{64}+$/', $result) == 1);
    }
}
