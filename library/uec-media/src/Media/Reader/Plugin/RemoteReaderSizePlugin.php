<?php

namespace UEC\Media\Reader\Plugin;

use UEC\Media\Reader\ReaderInterface;

class RemoteReaderSizePlugin extends AbstractReaderPlugin implements ReaderPluginInterface
{
    protected $size;

    public function __invoke()
    {
        if (null == $this->size)
            $this->size = 22;

        return $this->size;
    }
}
