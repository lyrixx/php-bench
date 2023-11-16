<?php

/**
 * @Revs(100)
 * @Iterations(100)
 */
class StringConcat
{
    public function benchSprintf()
    {
        sprintf('%s%s', 'a', 'b');
    }

    public function benchContact()
    {
        'a' . 'b';
    }
}
