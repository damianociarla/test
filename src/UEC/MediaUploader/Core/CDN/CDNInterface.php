<?php

namespace UEC\MediaUploader\Core\CDN;

use UEC\MediaUploader\Core\Model\MediaInterface;

interface CDNInterface
{
    /**
     * Return delivery path from media
     *
     * @param MediaInterface $media
     * @return string
     */
    public function getDeliveryPath(MediaInterface $media);
}