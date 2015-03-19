<?php

namespace UEC\Media\Reader\Adapter;

use UEC\Media\MediaInterface;
use UEC\Media\Reader\ReaderInterface;
use UEC\Media\Reader\RemoteReaderInterface;

class RemoteSizeAdapter extends AbstractAdapter implements RemoteSizeAdapterInterface
{
    function __construct(ReaderInterface $reader)
    {
        if (!$reader instanceof RemoteReaderInterface) {
            throw new \UnexpectedValueException('The adapter can accept only instance of RemoteReaderInterface');
        }

        parent::__construct($reader);
    }

    public function getSize()
    {
        $headers = get_headers($this->reader->getUri(), 1);
        return $headers['Content-Length'];
    }
}