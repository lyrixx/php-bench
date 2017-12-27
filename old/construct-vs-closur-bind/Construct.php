<?php

require __DIR__.'/CacheItem.php';
require __DIR__.'/CacheItemNoConstruct.php';

class Bench
{
    private $createCacheItem;

    public function __construct()
    {
        $d = 4;

        $this->createCacheItem = \Closure::bind(
            function ($a, $b, $c) use ($d) {
                $item = new CacheItemNoConstruct();
                $item->a = $a;
                $item->b = $b;
                $item->c = $c;
                $item->d = $d;

                return $item;
            },
            null,
            CacheItemNoConstruct::class
        );
    }

    /** @Revs(100000) */
    public function benchConstruct()
    {
       new CacheItem(1, 2, 3, 4);
    }

    /** @Revs(100000) */
    public function benchClosureBind()
    {
        $d = 4;
        $f = $this->createCacheItem;

        $f(1, 2, 3);
    }
}
