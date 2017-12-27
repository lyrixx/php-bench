<?php

namespace App;

class WithException
{
    private $randomness;

    public function __construct(int $randomness)
    {
        $this->randomness = $randomness;
    }

    public function process()
    {
        if (mt_rand(0, 100) < $this->randomness) {
            throw new \LogicException("Error Processing Request", 1);
        }

        return true;
    }
}
