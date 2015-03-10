<?php

namespace UEC\Media\Adapter;

interface AdapterBlobInterface extends AdapterInterface
{
    /**
     * Get blob
     *
     * @return string
     */
    public function getBlob();
}