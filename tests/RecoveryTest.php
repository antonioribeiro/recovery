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
}
