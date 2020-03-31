<?php

/**
 * @Revs(1000000)
 * @Iterations(5)
 */
class HashSimpleBench
{
    public function benchSha1()
    {
        sha1('foo');
    }

    public function benchHashSha1()
    {
        hash('sha1', 'foo');
    }

    public function benchMd5()
    {
        md5('foo');
    }

    public function benchHashMd5()
    {
        hash('md5', 'foo');
    }
}
