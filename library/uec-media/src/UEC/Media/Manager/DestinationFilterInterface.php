<?php

namespace UEC\Media\Manager;

use UEC\Media\Model\MediaInterface;

interface DestinationFilterInterface
{
    /**
     * @param MediaInterface $media
     * @return boolean
     */
    public function supports(MediaInterface $media);

    /**
     * @param MediaInterface $media
     * @return mixed
     */
    public function filter(MediaInterface $media);
}