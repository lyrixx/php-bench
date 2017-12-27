<?php

class baseDog
{
  public $name;
}

class dog
{
  protected $name;

  public function getName()
  {
    return $this->name;
  }

  public function __get($key)
  {
    return $this->$key;
  }

  public function setName($name)
  {
    return $this->name = $name;
  }

  public function __set($key, $value)
  {
    return $this->$key = $value;
  }
}

define('LOOP_MAX', 1000000);

// get via property
$dog = new baseDog();
$tGetPropertyStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
  $dog->name;
}
$tGetProperty = microtime(true) - $tGetPropertyStart;

// get via get
$dog = new dog();
$tGetGetStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
  $dog->getName();
}
$tGetGet = microtime(true) - $tGetGetStart;

// get via __get
$dog = new dog();
$tGet__GetStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
  $dog->name;
}
$tGet__Get = microtime(true) - $tGet__GetStart;

// set via property
$dog = new baseDog();
$tSetPropertyStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
  $dog->name = "dog";
}
$tSetProperty = microtime(true) - $tSetPropertyStart;

// set via set
$dog = new dog();
$tSetSetStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
  $dog->setName("dog");
}
$tSetSet = microtime(true) - $tSetSetStart;

// set via __set
$dog = new dog();
$tSet__SetStart = microtime(true);
for($i = 0; $i <= LOOP_MAX; $i++)
{
  $dog->name = "dog";
}
$tSet__Set = microtime(true) - $tSet__SetStart;

echo phpversion()."\n";
echo 'GET'."\n";
foreach (array('property' => $tGetProperty, 'get' => $tGetGet, '__get' => $tGet__Get) as $key => $value)
{
  $ratio = $value / $tGetProperty;
  echo sprintf('[%-8s] : %f', $key, $ratio)."\n";
}
echo 'SET'."\n";
foreach (array('property' => $tSetProperty, 'set' => $tSetSet, '__set' => $tSet__Set) as $key => $value)
{
  $ratio = $value / $tSetProperty;
  echo sprintf('[%-8s] : %f', $key, $ratio)."\n";
}
echo "\n\n";
