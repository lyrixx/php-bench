<?php

use App\Processor;

/**
 * @Revs(100000)
 * @Iterations(5)
 * @BeforeMethods({"init"})
 */
class ExceptionExceptionVsSupportBench
{
    private $exceptionProcessor;
    private $supportProcessor;

    public function init()
    {
        $rand = 75;

        $this->exceptionProcessor = new Processor('exception', $rand);
        $this->supportProcessor = new Processor('support', $rand);
    }

    public function benchException()
    {
        $this->exceptionProcessor->process();
    }

    public function benchSupport()
    {
        $this->supportProcessor->process();
    }
}
