<?php

namespace UEC\Media\Adapter;

use UEC\Media\Builder\MediaBuilderInterface;
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

    public function getMediaBuilderClassName();
    public function getMediaBuilderConfiguration();
}