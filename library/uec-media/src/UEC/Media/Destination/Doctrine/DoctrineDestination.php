<?php

namespace UEC\Media\Destination\Doctrine;

use UEC\Media\Manager\DestinationInterface;

class DoctrineDestination implements DestinationInterface
{
    protected $objectManager;

    public function __construct($objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function save($filterResponse)
    {
        $this->objectManager->persist($filterResponse);
    }
}