<?php

namespace UEC\MediaUploader\Core\Model;

use UEC\MediaUploader\Core\Persistence\MediaObjectPersistenceInterface;
use UEC\MediaUploader\Core\Persistence\MediaObjectRepository;

abstract class AbstractMediaManager implements MediaManagerInterface
{
    public function save(MediaInterface $media)
    {
        $this->getMediaObjectPersistence()->persist($media);
    }

    public function remove(MediaInterface $media)
    {
        $this->getMediaObjectPersistence()->remove($media);
    }

    public function create($context = null)
    {
        $className = $this->getClassName();
        return new $className($context);
    }

    /**
     * Get the object persistence
     *
     * @return MediaObjectPersistenceInterface
     */
    protected abstract function getMediaObjectPersistence();
}