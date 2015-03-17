<?php

namespace UEC\Media\Reader\Adapter;

use UEC\Media\MediaInterface;
use UEC\Media\Reader\ReaderInterface;

interface AdapterInterface
{
    /**
     * Get media
     *
     * @return ReaderInterface
     */
    public function getReader();
}