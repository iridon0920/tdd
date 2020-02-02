<?php

namespace Money;

class Sum implements Expression
{
    public $Augend;
    public $Addend;

    public function __construct(Money $augend, Money $addend)
    {
        $this->Augend = $augend;
        $this->Addend = $addend;
    }

    public function reduce(string $to)
    {
        $amount = $this->Augend->Amount + $this->Addend->Amount;
        return new Money($amount, $to);
    }
}
