<?php

namespace UEC\Media\Manager;

use UEC\Media\Model\MediaInterface;
use UEC\Media\Reader\ReaderInterface;

interface MediaManagerInterface
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
     * @return MediaManagerInterface
     */
    public function setMedia(MediaInterface $media);

    /**
     * Get reader
     *
     * @return ReaderInterface
     */
    public function getReader();

    /**
     * Set reader
     *
     * @param ReaderInterface $reader
     * @return MediaManagerInterface
     */
    public function setReader(ReaderInterface $reader);

    /**
     * Add a destination
     *
     * @param DestinationInterface $destination
     * @param DestinationFilterInterface $destinationFilter
     * @return mixed
     */
    public function addDestination(DestinationInterface $destination, DestinationFilterInterface $destinationFilter);

    /**
     * Performs saving destinations
     */
    public function exec();
}