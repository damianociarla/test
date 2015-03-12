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

    /**
     * Configure media builder
     *
     * @param MediaBuilderInterface $builder
     */
    public function buildMedia(MediaBuilderInterface $builder);
}