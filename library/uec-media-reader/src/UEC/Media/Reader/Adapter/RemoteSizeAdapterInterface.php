<?php

namespace UEC\Media\Reader\Adapter;

interface RemoteSizeAdapterInterface extends AdapterInterface
{
    /**
     * Get url length
     *
     * @return int
     */
    public function getSize();
}