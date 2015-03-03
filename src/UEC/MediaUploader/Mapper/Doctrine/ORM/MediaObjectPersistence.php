<?php

namespace UEC\MediaUploader\Mapper\Doctrine\ORM;

use Doctrine\ORM\EntityManager;
use UEC\MediaUploader\Mapper\Doctrine\DoctrineObjectPersistence;

class MediaObjectPersistence extends DoctrineObjectPersistence
{
    private $entityManager;

    function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager);
        $this->entityManager = $entityManager;
    }

    public function isNew($object)
    {
        return !$this->entityManager->getUnitOfWork()->isInIdentityMap($object);
    }
}