<?php

namespace Money;

class Doller
{
    private $Amount;
    
    public function __construct(int $amount)
    {
        $this->Amount = $amount;
    }

    public function times(int $multiplier)
    {
        return new Doller($this->Amount * $multiplier);
    }

    public function equals(Doller $doller) : bool
    {
        return $this->Amount == $doller->Amount;
    }
}