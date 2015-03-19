<?php

namespace ContextLocator;

use Pimple\Container;
use UEC\MediaUploader\Core\ContextLocator\ContextLocatorInterface;

class PimpleContextLocator extends Container implements ContextLocatorInterface
{
    public function get($context)
    {
        return $this[$context];
    }

    public function has($context)
    {
        return isset($this[$context]);
    }
}