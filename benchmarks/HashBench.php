<?php

/**
 * @Revs(10000)
 * @Iterations(5)
 * @BeforeMethods("setUp")
 */
class HashBench
{
    private string $string = '';

    public function setUp(): void
    {
        $this->string = str_repeat('X', 100);
    }

    /**
     * @ParamProviders({
     *     "provideAlgos",
     * })
     */
    public function benchAlgos($params): void
    {
        hash((string) $params['algo'], $this->string);
    }

    public function provideAlgos()
    {
        foreach (\hash_algos() as $algo) {
            if ($algo === 'md2') { // md2 is in a different performance category
                continue;
            }
            yield $algo => ['algo' => $algo];
        }
    }
}
