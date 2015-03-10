<?php

namespace UEC\Media\Reader\Decorator;

use UEC\Media\Reader\RemoteReader;

class RemoteReaderSizeDecorator extends RemoteReader
{
    protected $reader;

    public function __construct(RemoteReader $reader)
    {
        $this->reader = $reader;
    }

    public function getSize()
    {
        return 22;
    }
}