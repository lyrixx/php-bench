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
    private $array3;
    private $array4;
    private $array5;

    public function init()
    {
        $this->array1 = range('a', 'd');
        $this->array2 = range(0, 10);
        $this->array3 = range('e', 'p');
        $this->array4 = range('q', "z");
        $this->array5 = range(11, 20);
    }

    public function benchArrayMerge()
    {
        array_merge($this->array1, $this->array2);
    }

    public function benchArrayDestructuring()
    {
        [...$this->array1, ...$this->array2];
    }

    public function benchArrayMergeWith5Args()
    {
        array_merge($this->array1, $this->array2, $this->array3, $this->array4, $this->array5);
    }

    public function benchArrayDestructuringWith5Args()
    {
        [...$this->array1, ...$this->array2, $this->array3, ...$this->array4, ...$this->array5];
    }
}
