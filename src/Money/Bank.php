<?php

namespace Money;

class Bank
{
    private $Rates;

    public function reduce(Expression $source, string $to) : Money
    {
        return $source->reduce($this, $to);
    }
    
    public function addRate(string $from, string $to, int $rate)
    {
        $this->Rates[$from][$to] = $rate;
    }

    public function rate(string $from, string $to) : int
    {
        if ($from === $to) {
            return 1;
        }
        return $this->Rates[$from][$to];
    }
}
