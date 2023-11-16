<?php

/**
 * @Revs(100)
 * @Iterations(100)
 */
class ReflectionBench
{
    public array $cache = [];

    public function benchReflection()
    {
        return new ReflectionClass(Foobar::class);
    }

    public function benchReflectionWithCache()
    {
        return $this->cache[Foobar::class] ??= new ReflectionClass(Foobar::class);
    }
}

class Foobar
{
}
