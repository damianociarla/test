<?php

namespace UEC\Media\Adapter;

interface LocalSizeAdapterInterface extends AdapterInterface
{
    /**
     * Get file size
     *
     * @return int
     */
    public function getSize();
}