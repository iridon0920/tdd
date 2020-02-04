<?php

use Money\Bank;
use Money\Money;
use Money\Sum;
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

    public function testPlusReturnsSum()
    {
        $five = Money::doller(5);
        $result = $five->plus($five);
        $this->assertTrue($five->equals($result->Augend));
        $this->assertTrue($five->equals($result->Addend));
    }

    public function testReduceSum()
    {
        $sum = new Sum(Money::doller(3), Money::doller(4));
        $bank = new Bank();
        $result = $bank->reduce($sum, "USD");
        $this->assertTrue($result->equals(Money::doller(7)));
    }

    public function testReduceMoney()
    {
        $bank = new Bank();
        $result = $bank->reduce(Money::doller(1), "USD");
        $this->assertTrue($result->equals(Money::doller(1)));
    }

    public function testReduceMoneyDifferentCurrency()
    {
        $bank = new Bank();
        $bank->addRate("CHF", "USD", 2);
        $result = $bank->reduce(Money::franc(2), "USD");
        $this->assertTrue($result->equals(Money::doller(1)));
    }

    public function testArrayEquals()
    {
        
    }
}
