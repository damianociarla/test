<?php

namespace UEC\Media\Adapter;

use UEC\Media\MediaInterface;

abstract class AbstractAdapter implements AdapterInterface
{
    protected $media;

    function __construct(MediaInterface $media)
    {
        $this->media = $media;
    }

    public function getMedia()
    {
        return $this->media;
    }
}