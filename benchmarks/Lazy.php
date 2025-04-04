<?php

/**
 * @Revs(1000000)
 * @Iterations(5)
 * @BeforeMethods({"init"})
 */
class ArrayMergeVsArrayDestructuringBench
{
    private ReflectionClass $reflector;
    private Deps $deps;

    public function init()
    {
        $this->deps = new Deps();

        $this->reflector = new \ReflectionClass(MyClass::class);
    }

    public function benchDirect()
    {
        $direct = new MyClass($this->deps);
        $direct->deps;
    }

    public function benchLazy()
    {
        $lazy = $this->reflector->newLazyGhost(function ($entity) {
            $this->reflector->getProperty('deps')->setValue($entity, $this->deps);
        });
        $lazy->deps;
    }
}


class Deps
{
    public string $name = 'Hello';
}

class MyClass
{
    public function __construct(
        public Deps $deps
    ) {
    }
}
