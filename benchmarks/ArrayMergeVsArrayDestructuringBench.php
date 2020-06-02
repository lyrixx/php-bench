<?php

/**
 * @Revs(1000000)
 * @Iterations(5)
 * @BeforeMethods({"init"})
 */
class ArrayMergeVsArrayDestructuringBench
{
    private $array1;
    private $array2;

    public function init()
    {
        $this->array1 = range('a', 'd');
        $this->array2 = range(0, 10);
    }

    public function benchArrayMerge()
    {
        array_merge($this->array1, $this->array2);
    }

    public function benchArrayDestructuring()
    {
        [...$this->array1, ...$this->array2];
    }
}
