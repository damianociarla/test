<?php

namespace UEC\Media\Adapter\Common;

interface RemoteSizeAdapterInterface extends AdapterInterface
{
    /**
     * Get url length
     *
     * @return int
     */
    public function getSize();
}