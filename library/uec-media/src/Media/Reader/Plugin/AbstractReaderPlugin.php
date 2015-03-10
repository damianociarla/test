<?php

namespace UEC\Media\Reader\Plugin;

use UEC\Media\Reader\ReaderInterface;

abstract class AbstractReaderPlugin
{
    protected $reader;

    public function setReader(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function getReader()
    {
        return $this->reader;
    }
}
