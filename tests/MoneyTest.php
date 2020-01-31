<?php

use Money\Bank;
use Money\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testMulitiplication()
    {
        $five = Money::doller(5);
        $this->assertTrue($five->times(2)->equals(Money::doller(10)));
        $this->assertTrue($five->times(3)->equals(Money::doller(15)));
    }

    public function testEquality()
    {
        $doller = Money::doller(5);
        $this->assertTrue($doller->equals(Money::doller(5)));
        $this->assertFalse($doller->equals(Money::doller(6)));
        $franc = Money::franc(5);
        $this->assertFalse($franc->equals(Money::doller(5)));
    }

    public function testCurrency()
    {
        $this->assertEquals("USD", Money::doller(1)->currency());
        $this->assertEquals("CHF", Money::franc(1)->currency());
    }

    public function testSimpleAddition()
    {
        $five = Money::doller(5);
        $sum = $five->plus($five);
        $bank = new Bank();
        $reduced = $bank->reduce($sum, "USD");
        $this->assertTrue(Money::doller(10)->equals($reduced));
    }
}
