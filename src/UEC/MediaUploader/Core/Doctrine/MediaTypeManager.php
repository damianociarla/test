<?php

namespace UEC\MediaUploader\Core\Doctrine;

use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Core\Model\MediaTypeInterface;
use UEC\MediaUploader\Core\Model\MediaTypeManager as BaseMediaTypeManager;

class MediaTypeManager extends BaseMediaTypeManager
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

    public function findByMedia(MediaInterface $media)
    {
        return $this->doctrineObjectRepository
            ->setClassName($this->className)
            ->findOneBy(array(
                'media' => $media
            ));
    }

    protected function getMediaObjectPersistence()
    {
        return $this->doctrineObjectPersistence;
    }

    public function isNewMediaType(MediaTypeInterface $mediaType)
    {
        return !$this->doctrineObjectPersistence->isNew($mediaType);
    }
}