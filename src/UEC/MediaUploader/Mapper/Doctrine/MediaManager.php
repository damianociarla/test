<?php

namespace UEC\MediaUploader\Mapper\Doctrine;

use UEC\MediaUploader\Core\Model\AbstractMediaManager;
use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Core\Resolver\ResolverMediaTypeInterface;

class MediaManager extends AbstractMediaManager
{
    protected $doctrineObjectPersistence;
    protected $doctrineObjectRepository;
    protected $className;

    function __construct(ResolverMediaTypeInterface $resolverMediaType, DoctrineObjectPersistence $doctrineObjectPersistence, DoctrineObjectRepository $doctrineObjectRepository, $className)
    {
        parent::__construct($resolverMediaType);

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