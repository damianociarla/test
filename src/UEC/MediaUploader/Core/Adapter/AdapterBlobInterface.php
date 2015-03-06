<?php

namespace UEC\MediaUploader\Core\Adapter;

interface AdapterBlobInterface extends AdapterInterface
{
    /**
     * Get blob
     *
     * @return string
     */
    public function getBlob();
}