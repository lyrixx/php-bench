<?php

/**
 * @Revs(1000)
 * @Iterations(1)
 * @BeforeMethods({"init"})
 */
class ArrayUniqueVsFlip
{
    private $array;

    public function init()
    {
        $this->array = [];
        for ($i = 0; $i < 1000; ++$i) {
            $this->array[] = random_int(0, 1000);
        }
    }

    public function benchArrayUnique()
    {
        array_unique($this->array);
    }

    public function benchArrayFlip()
    {
        array_keys(array_flip($this->array));
    }
}
