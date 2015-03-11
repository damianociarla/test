<?php

namespace UEC\Media\Adapter;

use UEC\Media\MediaInterface;
use UEC\Media\Reader\RemoteReaderInterface;

class RemoteSizeAdapter extends AbstractAdapter implements RemoteSizeAdapterInterface
{
    function __construct(MediaInterface $media)
    {
        if (!$media->getReader() instanceof RemoteReaderInterface) {
            throw new \UnexpectedValueException('The adapter can accept only instance of RemoteReaderInterface');
        }

        parent::__construct($media);
    }

    public function getSize()
    {
        $headers = get_headers($this->media->getUri(), 1);
        return $headers['Content-Length'];
    }
}