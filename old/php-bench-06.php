<?php

define('LOOP_MAX', 1000000);

class Big
{
    private $big = array(
        'new1' => array(),
        'new2' => array(),
        'new3' => array(),
        'new4' => array(),
    );

    public function getBigValue($index)
    {
        return $this->big[$index];
    }
}

class AnalysisDiff
{
    private $newIds;
    private $existingIds;
    private $fixedIds;
    private $ignoredIds;

    public function __construct(array $newIds = array(), array $existingIds = array(), array $fixedIds = array(), array $ignoredIds = array())
    {
        $this->newIds = $newIds;
        $this->existingIds = $existingIds;
        $this->fixedIds = $fixedIds;
        $this->ignoredIds = $ignoredIds;
    }

    public function getNewIds()
    {
        return $this->newIds;
    }

    public function addNewId($id)
    {
        $this->newIds[$id] = $id;
    }

    public function hasNewId($id)
    {
        return array_key_exists($id, $this->newIds);
    }

    public function deletedNewId($id);
    {
        unset($this->newIds[$id]);
    }

    // same things for other properties

    public function jsonSerialize()
    {
        return array(
            'newIds' => array_values($this->newIds),
            'existingIds' => array_values($this->existingIds),
            'fixedIds' => array_values($this->fixedIds),
            'ignoredIds' => array_values($this->ignoredIds),
        );
    }

    public function countViolationByStatus()
    {
        return array(
            'newIds' => count(array_diff_key($this->newIds, $this->ignored)),
            'existingIds' => count(array_diff_key($this->existingIds, $this->ignored)),
            'fixedIds' => count(array_diff_key($this->fixedIds, $this->ignored)),
            'ignoredIds' => count($this->ignoredIds),
        );
    }
}

$tAStart = microtime(true);
$big = new Big();
for($i = 0; $i <= LOOP_MAX; $i++)
{
    $big->getBigValue('new3');
}
$tA = microtime(true) - $tAStart;

$tBStart = microtime(true);
$small = new Small();
for($i = 0; $i <= LOOP_MAX; $i++)
{
    $small->getSmallValue('new3');
}
$tB = microtime(true) - $tBStart;

echo phpversion()."\n";
foreach (array('big' => $tA, 'small' => $tB) as $key => $value)
{
  $ratio = $value / $tB;
  echo sprintf('[%-16s] : %f', $key, $ratio)."\n";
}
echo "\n\n";
