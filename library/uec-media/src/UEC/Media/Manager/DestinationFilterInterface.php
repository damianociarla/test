<?php

namespace UEC\Media\Manager;

use UEC\Media\Model\MediaInterface;

interface DestinationFilterInterface
{
    /**
     * Check if the media is supported
     *
     * @param MediaInterface $media
     * @return boolean
     */
    public function supports(MediaInterface $media);

    /**
     * Filter the information of the media and makes it readable by destination
     *
     * @param MediaInterface $media
     * @return mixed
     */
    public function filter(MediaInterface $media);
}