<?php

define('LOOP_MAX', 10000);

class Foo
{
    public function getId()
    {
        return 10;
    }
}

// in_array
$tAStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
    $foo = new Foo();
    for ($i=0; $i < 2000; $i++) {
        $foo->getId();
    }
}
$tA = microtime(true) - $tAStart;

// isset
$tBStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
    $foo = new Foo();
    $id = $foo->getId();;
    for ($i=0; $i < 2000; $i++) {
        $id;
    }
}
$tB = microtime(true) - $tBStart;

echo phpversion()."\n";
foreach (array('get' => $tA, 'var' => $tB) as $key => $value)
{
  $ratio = $value / $tB;
  echo sprintf('[%-16s] : %f', $key, $ratio)."\n";
}
echo "\n\n";
