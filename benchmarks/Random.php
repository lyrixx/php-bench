<?php

/**
 * @Revs(100)
 * @Iterations(100)
 */
class RegexBench
{
    public function benchRand()
    {
        rand(0, 100);
    }

    public function benchMtRand()
    {
        mt_rand(0, 100);
    }

    public function benchRandomInt()
    {
        random_int(0, 100);
    }
}
