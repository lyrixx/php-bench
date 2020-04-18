<?php

/**
 * @Revs(1000)
 * @Iterations(1)
 * @BeforeMethods({"init"})
 */
class StringableMethodVsCast
{
    /** @var \Stringable */
    private $stringable;

    public function init()
    {
        $this->stringable = new class() implements \Stringable {
            public function __toString()
            {
                return '';
            }
        };
    }

    public function benchToStringMethod()
    {
        $this->stringable->__toString();
    }

    public function benchCast()
    {
        (string) ($this->stringable);
    }
}
