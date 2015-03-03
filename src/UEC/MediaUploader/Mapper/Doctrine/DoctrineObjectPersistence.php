<?php

namespace UEC\MediaUploader\Mapper\Doctrine;

use Doctrine\Common\Persistence\ObjectManager;
use UEC\MediaUploader\Core\Persistence\MediaObjectPersistenceInterface;

abstract class DoctrineObjectPersistence implements MediaObjectPersistenceInterface
{
    private $objectManager;

    function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function persist($object)
    {
        $this->objectManager->persist($object);
        $this->objectManager->flush();
    }

    public function remove($object)
    {
        $this->objectManager->remove($object);
        $this->objectManager->flush();
    }
}