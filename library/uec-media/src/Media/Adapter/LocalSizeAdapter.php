<?php

namespace UEC\Media\Adapter;

class LocalSizeAdapter extends AbstractAdapter implements LocalSizeAdapterInterface
{
    public function getSize()
    {
        return filesize($this->getReader()->getUri());
    }
}