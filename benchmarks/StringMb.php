<?php

/**
 * @Revs(10000)
 * @Iterations(10)
 */
class StringMb
{
    public function benchStrlen()
    {
        strlen('azertyui');
    }

    public function benchMbStrlen()
    {
        mb_strlen('azertyui');
    }
}
