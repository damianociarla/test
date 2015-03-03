<?php

namespace UEC\MediaUploader\Core\Doctrine\ORM;

use Doctrine\ORM\EntityManager;
use UEC\MediaUploader\Core\Doctrine\DoctrineObjectRepository;

class MediaObjectRepository extends DoctrineObjectRepository
{
    function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager);
    }
}