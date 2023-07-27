<?php

/**
 * @Revs(100)
 * @Iterations(100)
 * @BeforeMethods({"init"})
 */
class Cast
{
    private $nullData;
    private $objData;

    public function init()
    {
        $this->nullData = null;
        $this->objData = new DateTime();
    }

    public function benchWithNullAndCast()
    {
        if ($this->nullData) {
        }
    }

    public function benchWithNullAndSame()
    {
        if (null !== $this->nullData) {
        }
    }

    public function benchWithNullAndInstanceOf()
    {
        if ($this->nullData instanceof DateTime) {
        }
    }

    public function benchWithObjAndCast()
    {
        if ($this->objData) {
        }
    }

    public function benchWithObjAndSame()
    {
        if (null !== $this->objData) {
        }
    }

    public function benchWithObjAndInstanceOf()
    {
        if ($this->objData instanceof DateTime) {
        }
    }
}
