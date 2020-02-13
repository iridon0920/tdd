<?php

namespace Money;

class Sum implements Expression
{
    public $Augend;
    public $Addend;

    public function __construct(Expression $augend, Expression $addend)
    {
        $this->Augend = $augend;
        $this->Addend = $addend;
    }

    public function reduce(Bank $bank, string $to) : Money
    {
        $amount = $this->Augend->reduce($bank, $to)->Amount
            + $this->Addend->reduce($bank, $to)->Amount;
        return new Money($amount, $to);
    }

    public function plus (Expression $addend) : Expression
    {
        return new Sum($this, $addend);
    }

    public function times(int $multiplier) : Expression
    {
        return new Sum($this->Augend->times($multiplier), $this->Addend->times($multiplier));
    }
}
