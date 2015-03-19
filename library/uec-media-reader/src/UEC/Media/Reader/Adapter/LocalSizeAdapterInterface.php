<?php

namespace UEC\Media\Reader\Adapter;

interface LocalSizeAdapterInterface extends AdapterInterface
{
    /**
     * Get file size
     *
     * @return int
     */
    public function getSize();
}