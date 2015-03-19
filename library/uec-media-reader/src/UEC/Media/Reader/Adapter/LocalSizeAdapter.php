<?php

namespace UEC\Media\Reader\Adapter;

class LocalSizeAdapter extends AbstractAdapter implements LocalSizeAdapterInterface
{
    public function getSize()
    {
        return filesize($this->reader->getUri());
    }
}