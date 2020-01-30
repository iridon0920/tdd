<?php

namespace Money;

class Franc
{
    private $Amount;

    public function __construct(int $amount)
    {
        $this->Amount = $amount;
    }

    public function times(int $multiplier)
    {
        return new Franc($this->Amount * $multiplier);
    }

    public function equals(Franc $franc): bool
    {
        return $this->Amount == $franc->Amount;
    }
}
