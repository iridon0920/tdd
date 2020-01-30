<?php

namespace Money;

class Money
{
    protected $Amount;
    protected $Currency;

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

    public function times(int $multiplier): Money
    {
        return new Money($this->Amount * $multiplier, $this->Currency);
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
