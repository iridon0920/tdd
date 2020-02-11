<?php

namespace Money;

class Money implements Expression
{
    public $Amount;
    public $Currency;

    public function __construct(int $amount, string $currency)
    {
        $this->Amount = $amount;
        $this->Currency = $currency;
    }

    public function equals(Money $money): bool
    {
        return $this->Amount == $money->Amount
            && $this->currency() == $money->currency();
    }

    public function currency(): string
    {
        return $this->Currency;
    }

    public function times(int $multiplier): Expression
    {
        return new Money($this->Amount * $multiplier, $this->Currency);
    }

    public function plus(Expression $addend) : Expression
    {
        return new Sum($this, $addend);
    }

    public function reduce(Bank $bank, string $to) : Money
    {
        $rate = $bank->rate($this->Currency, $to);
        return new Money($this->Amount / $rate, $to);
    }

    static function doller(int $amount): Money
    {
        return new Money($amount, "USD");
    }

    static function franc(int $amount): Money
    {
        return new Money($amount, "CHF");
    }
}
