<?php

define('LOOP_MAX', 100000);

class A
{
    public function getCallBack()
    {
        return function () {
            return 10;
        };
    }
}

class B
{
    public function getCallBack()
    {
        return [$this, 'callback'];
    }

    public function callback()
    {
        return 10;
    }
}

$a = new A;
$b = new B;

$tAStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
    $c = $a->getCallBack();
    $c();
}
$tA = microtime(true) - $tAStart;

$tBStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
    $c = $b->getCallBack();
    $c();
}
$tB = microtime(true) - $tBStart;

echo phpversion()."\n";
foreach (array('anonymous' => $tA, 'method' => $tB) as $key => $value)
{
  $ratio = $value / $tB;
  echo sprintf('[%-16s] : %f', $key, $ratio)."\n";
}
echo "\n\n";
