<?php

namespace UEC\Media\Adapter;

use UEC\Media\MediaInterface;
use UEC\Media\Reader\ReaderInterface;
use UEC\Media\UriInterface;

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

    /**
     * Get reader
     *
     * @return UriInterface
     */
    public function getUri();
}