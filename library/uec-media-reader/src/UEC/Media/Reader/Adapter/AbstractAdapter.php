<?php

namespace UEC\Media\Reader\Adapter;

use UEC\Media\MediaInterface;
use UEC\Media\Reader\ReaderInterface;

abstract class AbstractAdapter implements AdapterInterface
{
    protected $reader;

    function __construct(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function getReader()
    {
        return $this->reader;
    }
}