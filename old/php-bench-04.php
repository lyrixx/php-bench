<?php

$arrayMax = 20000;
$array    = array_combine(range(1, $arrayMax), range(1, $arrayMax));
$key      = 11111;

define('LOOP_MAX', 10000);

// in_array
$tAStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
  in_array($key, $array);
}
$tA = microtime(true) - $tAStart;

// isset
$tBStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
  isset($array[$key]);
}
$tB = microtime(true) - $tBStart;

// array_key_exists
$tCStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
  array_key_exists($key, $array);
}
$tC = microtime(true) - $tCStart;

echo phpversion()."\n";
foreach (array('in_array' => $tA, 'isset' => $tB, 'array_key_exists' => $tC) as $key => $value)
{
  $ratio = $value / $tB;
  echo sprintf('[%-16s] : %f', $key, $ratio)."\n";
}
echo "\n\n";
