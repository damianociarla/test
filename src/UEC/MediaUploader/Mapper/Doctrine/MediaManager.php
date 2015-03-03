<?php

namespace UEC\MediaUploader\Mapper\Doctrine;

use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Core\Model\MediaManager as BaseMediaManager;

class MediaManager extends BaseMediaManager
{
    protected $doctrineObjectPersistence;
    protected $doctrineObjectRepository;
    protected $className;

    function __construct(DoctrineObjectPersistence $doctrineObjectPersistence, DoctrineObjectRepository $doctrineObjectRepository, $className)
    {
        $this->doctrineObjectPersistence = $doctrineObjectPersistence;
        $this->doctrineObjectRepository = $doctrineObjectRepository;
        $this->className = $className;
    }

    public function getClassName()
    {
        return $this->className;
    }

    public function findById($id)
    {
        return $this->doctrineObjectRepository->setClassName($this->className)->findById($id);
    }

    protected function getMediaObjectPersistence()
    {
        return $this->doctrineObjectPersistence;
    }

    public function isNewMedia(MediaInterface $media)
    {
        return !$this->doctrineObjectPersistence->isNew($media);
    }
}