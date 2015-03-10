<?php

namespace UEC\Media\Reader\Plugin;

class RemoteReaderSizePlugin
{
    protected $reader;

    public function setReader($reader)
    {
        $this->reader = $reader;
    }

    public function getSize()
    {
        return 22;
    }

    public function getCapability()
    {
        return 'getSize';
    }
}