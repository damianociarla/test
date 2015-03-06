<?php

namespace CDN;

use UEC\MediaUploader\Core\CDN\CDNInterface;
use UEC\MediaUploader\Core\Model\MediaInterface;

class CDNBase implements CDNInterface
{
    public function getDeliveryPath(MediaInterface $media)
    {
        return $media->getPath();
    }
}