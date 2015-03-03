<?php

namespace UEC\MediaUploader\Core\Doctrine;

use Doctrine\Common\Persistence\ObjectManager;
use UEC\MediaUploader\Core\Repository\MediaObjectRepositoryInterface;

abstract class DoctrineObjectRepository implements MediaObjectRepositoryInterface
{
    private $objectManager;
    private $className;

    function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Set className
     *
     * @param mixed $className
     * @return MediaObjectRepositoryInterface
     */
    public function setClassName($className)
    {
        $this->className = $className;
        return $this;
    }

    public function findBy(array $criteria)
    {
        return $this->objectManager->getRepository($this->className)->findBy($criteria);
    }

    public function findOneBy(array $criteria)
    {
        return $this->objectManager->getRepository($this->className)->findOneBy($criteria);
    }

    public function findById($id)
    {
        return $this->objectManager->getRepository($this->className)->find($id);
    }
}