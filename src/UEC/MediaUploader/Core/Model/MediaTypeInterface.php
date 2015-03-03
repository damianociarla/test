<?php

namespace UEC\MediaUploader\Core\Model;

interface MediaTypeInterface
{
    /**
     * Get media
     *
     * @return MediaInterface
     */
    public function getMedia();

    /**
     * Set media
     *
     * @param MediaInterface $media
     * @return MediaType
     */
    public function setMedia(MediaInterface $media);
}