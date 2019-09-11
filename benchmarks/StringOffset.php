<?php

/**
 * @Revs(10000)
 * @Iterations(10)
 */
class StringOffset
{
    public function benchArrayStyle()
    {
        'foobar'[1];
    }

    public function benchSubStr()
    {
        substr('foobar', 1, 1);
    }
}
