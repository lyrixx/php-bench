<?php

/**
 * @Revs(1000000)
 * @Iterations(5)
 */
class IfBool
{
    public function benchWithNullCast()
    {
        $a = null;
        if ($a) {
        }
    }

    public function benchWithNullExact()
    {
        $a = null;
        if (null === $a) {
        }
    }

    public function benchWithArrayCast()
    {
        $a = [];
        if ($a) {
        }
    }

    public function benchWithArrayExact()
    {
        $a = [];
        if ([] === $a) {
        }
    }

    public function benchWithArrayCount()
    {
        $a = [];
        if (0 === count($a)) {
        }
    }

    public function benchWithStringCast()
    {
        $a = '';
        if ($a) {
        }
    }

    public function benchWithStringExact()
    {
        $a = '';
        if ('' === $a) {
        }
    }

    public function benchWithStringCount()
    {
        $a = '';
        if (0 === strlen($a)) {
        }
    }
}
