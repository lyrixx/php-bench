<?php

/**
 * @Revs(1000)
 * @Iterations(1)
 * @BeforeMethods({"init"})
 */
class CountableMethodVsFunction
{
    private $countable;

    public function init()
    {
        $this->countable = new class() implements \Countable {
            public function count()
            {
                return 0;
            }
        };
    }

    public function benchCountMethod()
    {
        $this->countable->count();
    }

    public function benchCountFunction()
    {
        \count($this->countable);
    }
}
