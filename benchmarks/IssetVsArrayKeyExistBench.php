<?php

/**
 * @Revs(10000)
 * @Iterations(10)
 */
class IssetVsArrayKeyExistBench
{
    public function benchIssetKO()
    {
        $a = [];
        isset($a['nope']);
    }

    public function benchIssetOK()
    {
        $a = ['yop' => true];
        isset($a['yop']);
    }

    public function benchAkeKO()
    {
        $a = [];
        \array_key_exists('nope', $a) && null !== $a['nope'];
    }

    public function benchAkeOK()
    {
        $a = ['yop' => true];
        \array_key_exists('yop', $a) && null !== $a['yop'];
    }
}
