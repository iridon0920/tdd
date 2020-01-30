<?php

use Money\Doller;
use Money\Franc;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testMulitiplication()
    {
        $five = new Doller(5);
        $this->assertEquals($five->times(2), new Doller(10));
        $this->assertEquals($five->times(3), new Doller(15));
    }

    public function testEquality()
    {
        $doller = new Doller(5);
        $this->assertTrue($doller->equals(new Doller(5)));
        $this->assertFalse($doller->equals(new Doller(6)));
    }

    public function testFrancMultiplication()
    {
        $five = new Franc(5);
        $this->assertEquals($five->times(2), new Franc(10));
        $this->assertEquals($five->times(3), new Franc(15));
    }
}