<?php

/**
 * @Revs(1000)
 * @Iterations(1)
 * @BeforeMethods({"init"})
 */
class ArrayMapVsForeachBench
{
    private $array;

    public function init()
    {
        $this->array = array_fill(0, 1000, 'foo');
    }

    public function benchArrayMap()
    {
        $baseHeader = 'base';
        $delimiter = ',';

        return array_map(function ($language) use ($baseHeader, $delimiter) {
            return $baseHeader . $delimiter . $language;
        }, $this->array);
    }

    public function benchArrayMapWithoutUse()
    {

        return array_map(function ($language) {
            return 'base' . ',' . $language;
        }, $this->array);
    }

    public function benchArrayMapWithoutUseAndStringInterpolation()
    {

        return array_map(function ($language) {
            return "base,$language";
        }, $this->array);
    }

    public function benchForeach()
    {
        $baseHeader = 'base';
        $delimiter = ',';

        $ret = array();
        foreach ($this->array as $language) {
            $ret[] = $baseHeader . $delimiter . $language;
        }

        return $ret;
    }

    public function benchForeachWithStringInterpolation()
    {
        $baseHeader = 'base';
        $delimiter = ',';

        $ret = array();
        foreach ($this->array as $language) {
            $ret[] = "$baseHeader$delimiter$language";
        }

        return $ret;
    }
}
