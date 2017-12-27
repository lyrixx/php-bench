<?php

namespace foo {
    function foo() {
        define('LOOP_MAX', 1000000);

        $array = [];
        $object = new \stdClass();

        $tAStart = microtime(true);
        for($i = 0; $i <= LOOP_MAX; $i++)
        {
            is_array($array);
            is_object($array);
            is_array($object);
            is_object($object);

        }
        $tA = microtime(true) - $tAStart;

        $tBStart = microtime(true);
        for($i = 0; $i <= LOOP_MAX; $i++)
        {
            \is_array($array);
            \is_object($array);
            \is_array($object);
            \is_object($object);
        }
        $tB = microtime(true) - $tBStart;

        echo phpversion()."\n";
        foreach (array('not root' => $tA, 'root' => $tB) as $key => $value)
        {
          $ratio = $value / $tB;
          echo sprintf('[%-16s] : %f', $key, $ratio)."\n";
        }
        echo "\n";
    }
}

namespace {
    foo\foo();
}
