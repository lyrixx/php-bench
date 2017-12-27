<?php

namespace App;

class WithSupport
{
    private $randomness;

    public function __construct(int $randomness)
    {
        $this->randomness = $randomness;
    }

    public function process()
    {
        return true;
    }

    public function support()
    {
        return mt_rand(0, 100) < $this->randomness;
    }
}
