<?php

namespace UEC\MediaUploader\Core\Model;

abstract class MediaType implements MediaTypeInterface
{
    /**
     * @var MediaInterface
     */
    protected $media;

    public function getMedia()
    {
        return $this->media;
    }

    public function setMedia(MediaInterface $media)
    {
        $this->media = $media;
        return $this;
    }
}