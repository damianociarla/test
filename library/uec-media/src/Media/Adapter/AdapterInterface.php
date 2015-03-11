<?php

namespace UEC\Media\Adapter;

use UEC\Media\MediaInterface;
use UEC\Media\Reader\ReaderInterface;

interface AdapterInterface
{
    /**
     * Get media
     *
     * @return MediaInterface|AdapterInterface
     */
    public function getMedia();

    /**
     * Get reader
     *
     * @return ReaderInterface
     */
    public function getReader();
}