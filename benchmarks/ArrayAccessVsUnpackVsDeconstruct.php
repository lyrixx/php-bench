<?php

/**
 * @Revs(1000)
 * @Iterations(1)
 * @BeforeMethods({"init"})
 */
class ArrayAccessVsUnpackVsDeconstruct
{
    private $array;
    private $callback;

    public function init()
    {
        $this->array = [];
        for ($i = 0; $i < 1000; ++$i) {
            $this->array[] = ['foo', 'bar'];
        }
    }

    public function benchTraverseArrayUnpack()
    {
        foreach ($this->array as $values) {
            $this->callback(...$values);
        }
    }

    public function benchTraverseArrayAccess()
    {
        foreach ($this->array as $values) {
            $this->callback($values[0], $values[1]); 
        }
    }

    public function benchTraverseArrayDeconstruct()
    {
        foreach ($this->array as [$foo, $bar]) {
            $this->callback($foo, $bar);
        }
    }

    private function callback(string $foo, string $bar): void
    {
        // noop
    }
}
