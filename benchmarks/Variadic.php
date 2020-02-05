<?php

use App\Processor;

/**
 * @Revs(1000000)
 * @Iterations(5)
 */
class Variadoc
{
    public function benchWithAndEmpty()
    {
        with_variadic('symfony/blockchain', '1.2.3', 'foobar');
    }

    public function benchWithAndEmptyNotEmpty()
    {
        with_variadic('symfony/blockchain', '1.2.3', 'foobar', 'a', 'b');
    }

    public function benchWithoutAndEmpty()
    {
        without_variadic('symfony/blockchain', '1.2.3', 'foobar');
    }

    public function benchWithoutAndEmptyNotEmpty()
    {
        without_variadic('symfony/blockchain', '1.2.3', 'foobar', 'a', 'b');
    }
}

function with_variadic($a, $b, $message, ...$args)
{
    $args ? sprintf($message, $args) : $message;
}

function without_variadic($a, $b, $message)
{
    3 < func_num_args() ? sprintf($message, array_slice(func_get_args(), 3)) : $message;

}
