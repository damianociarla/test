<?php

namespace UEC\MediaUploader\Mapper\Doctrine\ORM;

use Doctrine\ORM\EntityManager;
use UEC\MediaUploader\Mapper\Doctrine\DoctrineObjectRepository;

class MediaObjectRepository extends DoctrineObjectRepository
{
    function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager);
    }
}