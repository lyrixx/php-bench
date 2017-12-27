<?php

class A
{
  private $a1 = array();
  private $a2 = array();
}

class B
{
  private $b1 = array();
  private $b2;

  public function __construct()
  {
    $this->b2 = array();
  }
}

class C
{
  private $c1;
  private $c2;

  public function __construct()
  {
    $this->c1 = array();
    $this->c2 = array();
  }
}

define('LOOP_MAX', 1000000);

// all as attribute
$tAStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
  new A();
}
$tA = microtime(true) - $tAStart;

// one as attribute, one in construct
$tBStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
  new B();
}
$tB = microtime(true) - $tBStart;

// all in construct
$tCStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
  new C();
}
$tC = microtime(true) - $tCStart;

echo phpversion()."\n";
foreach (array('attribute' => $tA, 'both' => $tB, 'construct' => $tC) as $key => $value)
{
  $ratio = $value / $tA;
  echo sprintf('[%-10s] : %f', $key, $ratio)."\n";
}
echo "\n\n";
