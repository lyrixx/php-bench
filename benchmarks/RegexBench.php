<?php

/**
 * @Revs(100)
 * @Iterations(100)
 */
class RegexBench
{
    public function benchOneBigString()
    {
        preg_match("{^/(register|documentation)$}", "/register");
        preg_match("{^/(register|documentation)$}", "/foo");
    }

    public function benchArrayConcat()
    {
        preg_match("{(?:^/register$|^/documentation$)}", "/register");
        preg_match("{(?:^/register$|^/documentation$)}", "/foo");
    }
}
