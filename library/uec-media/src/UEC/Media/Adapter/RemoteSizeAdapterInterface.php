<?php

namespace UEC\Media\Adapter;

interface RemoteSizeAdapterInterface extends AdapterInterface
{
    /**
     * Get url length
     *
     * @return int
     */
    public function getSize();
}