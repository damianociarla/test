<?php

namespace UEC\MediaUploader\Type\Pdf\Model;

use UEC\MediaUploader\Core\Model\MediaInterface;

interface MediaTypePdfImageInterface extends MediaTypePdfExtensionInterface
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
     * @return MediaTypePdfImageInterface
     */
    public function setMedia(MediaInterface $media);
}