<?php

use App\Processor;

/**
 * @Revs(1000000)
 * @Iterations(5)
 */
class TypeHintFunction
{
    public function benchWith()
    {
        with_type_hint('A');
    }

    public function benchWithout()
    {
        without_type_hint('A');
    }
}

function with_type_hint(string $a)
{

}

function without_type_hint($a)
{

}
