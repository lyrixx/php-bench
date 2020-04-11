<?php

/**
 * @Revs(1000)
 * @Iterations(1)
 * @BeforeMethods({"init"})
 */
class CallbackInvokeVsCallUserFunc
{
    private $callback;
    private $arguments;

    public function init()
    {
        $this->arguments = [];
        for ($i = 0; $i < 1000; ++$i) {
            $this->arguments[] = ['foo', 'bar'];
        }
        $this->callback = function ($foo, $bar) {
            // noop
        };
    }

    public function benchCallUserFuncArray()
    {
        foreach ($this->arguments as $args) {
            \call_user_func_array($this->callback, $args);
        }
    }

    public function benchInvoke()
    {
        foreach ($this->arguments as $args) {
            ($this->callback)(...$args); 
        }
    }

    public function benchCallUserFunc()
    {
        foreach ($this->arguments as $args) {
            \call_user_func($this->callback, ...$args); 
        }
    }
}
