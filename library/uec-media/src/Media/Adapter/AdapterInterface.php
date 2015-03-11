<?php

namespace UEC\Media\Adapter;

use UEC\Media\MediaInterface;

interface AdapterInterface
{
    /**
     * Get media
     *
     * @return MediaInterface|AdapterInterface
     */
    public function getMedia();
}