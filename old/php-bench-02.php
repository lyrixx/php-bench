<?php


$array = array(
  0 => 'test',
  1 => 'test',
  2 => 'test',
  5 => 'test',
);

define('LOOP_MAX', 1000000);

// Isset return false
$tIssetFalseStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
  if (isset($array[4]))
  {
    $a = $array[4];
  }
  $a = null;
}
$tIssetFalse = microtime(true) - $tIssetFalseStart;

// Isset return true
$tIssetTrueStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
  if (isset($array[0]))
  {
    $a = $array[0];
  }
  $a = null;
}
$tIssetTrue = microtime(true) - $tIssetTrueStart;

// @ return false
$tAtFalseStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
  $a = @$array[4];
}
$tAtFalse = microtime(true) - $tAtFalseStart;

// @ return true
$tAtTrueStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
  $a = @$array[0];
}
$tAtTrue = microtime(true) - $tAtTrueStart;


echo phpversion()."\n";
echo 'We test something not set'."\n";
foreach (array('isset' => $tIssetFalse, '@' => $tAtFalse) as $key => $value)
{
  $ratio = $value / $tIssetFalse;
  echo sprintf('[%-8s] : %f', $key, $ratio)."\n";
}
echo 'We test something set'."\n";
foreach (array('isset' => $tIssetTrue, '@' => $tAtTrue) as $key => $value)
{
  $ratio = $value / $tIssetTrue;
  echo sprintf('[%-8s] : %f', $key, $ratio)."\n";
}

echo "\n\n";
