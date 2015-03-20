<?php

namespace UEC\Media\Manager;

use UEC\Media\Model\MediaInterface;
use UEC\Media\Reader\ReaderInterface;

class MediaManager implements MediaManagerInterface
{
    /**
     * @var MediaInterface
     */
    private $media;

    /**
     * @var ReaderInterface
     */
    private $reader;

    /**
     * @var array
     */
    private $destinations;

    public function getMedia()
    {
        return $this->media;
    }

    public function setMedia(MediaInterface $media)
    {
        $this->media = $media;
        return $this;
    }

    public function getReader()
    {
        return $this->reader;
    }

    public function setReader(ReaderInterface $reader)
    {
        $this->reader = $reader;
        return $this;
    }

    public function addDestination(DestinationInterface $destination, DestinationFilterInterface $destinationFilter)
    {
        $this->destinations[] = array(
            'destination' => $destination,
            'filter' => $destinationFilter,
        );
    }

    public function exec()
    {
        /** @var DestinationInterface $destination */
        foreach ($this->destinations as $destination) {
            /** @var DestinationBuilderInterface $builder */
            $filter = $destination['filter'];

            if (!$filter->supports($this->media)) {
                continue;
            }

            $filterResponse = $filter->filter($this->media);
            $destination['destination']->save($filterResponse);
        }
    }
}