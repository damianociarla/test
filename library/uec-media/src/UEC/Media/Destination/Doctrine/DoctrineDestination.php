<?php

namespace UEC\Media\Destination\Doctrine;

use UEC\Media\Manager\DestinationInterface;
use UEC\Media\Model\MediaInterface;

class DoctrineDestination implements DestinationInterface
{
    protected $objectManager;

    public function __construct($objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function save($result)
    {
        $this->objectManager->persist($result);
    }
}