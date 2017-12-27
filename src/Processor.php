<?php

namespace App;

class Processor
{
    private $type;
    private $processor;

    public function __construct(string $type, int $randomness)
    {
        $this->type = $type;
        if ('exception' === $type) {
            $this->processor = new WithException($randomness);
        } elseif ('support' === $type) {
            $this->processor = new WithSupport($randomness);
        } else {
            throw new \InvalidArgumentException("The '$type' is not supported.");
        }
    }

    public function process(int $level = 10)
    {
        // Just increase the stack size to be more realist
        if (0 < $level) {
            return $this->process(--$level);
        }
        if ('exception' === $this->type) {
            try {
                return $this->processor->process();;
            } catch (\LogicException $e) {
                return null;
            }
        }

        if ('support' === $this->type) {
            if ($this->processor->support()) {
                return $this->processor->process();
            }

            return null;
        }
    }
}
