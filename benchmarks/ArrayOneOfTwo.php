<?php

/**
 * @Revs(1000)
 * @Iterations(1)
 * @BeforeMethods({"init"})
 */
class ArrayOneOfTwo
{
    private array $array;

    public function init()
    {
        $this->array = [...range(1, 100_000)];
        // $this->array = [0, 'a', 10, 'b', 10, 'c'];
    }

    public function benchWithForeach()
    {
        foreach ($this->array as $i => $value) {
            if ($i % 2 === 1) {
                continue;
            }

            if ($value <= 0) {
                throw new \RuntimeException('$value should be greater than 0');
            }
        }
    }

    public function benchWithFor()
    {
        for ($i = 0, $c = count($this->array); $i < $c; $i = $i + 2) {
            if ($this->array[$i] <= 0) {
                throw new \RuntimeException('$value should be greater than 0');
            }
        }
    }
}
