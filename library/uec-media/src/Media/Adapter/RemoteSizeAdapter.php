<?php

namespace UEC\Media\Adapter;

class RemoteSizeAdapter extends AbstractAdapter implements RemoteSizeAdapterInterface
{
    public function getSize()
    {
        $headers = get_headers($this->getReader()->getUri(), 1);
        return $headers['Content-Length'];
    }
}