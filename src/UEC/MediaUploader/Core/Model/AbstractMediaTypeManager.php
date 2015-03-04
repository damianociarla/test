<?php

namespace UEC\MediaUploader\Core\Model;

use UEC\MediaUploader\Core\Persistence\MediaObjectPersistenceInterface;

abstract class AbstractMediaTypeManager implements MediaTypeManagerInterface
{
    public function save(MediaTypeInterface $mediaType)
    {
        $this->getMediaObjectPersistence()->persist($mediaType);
    }

    public function remove(MediaTypeInterface $mediaType)
    {
        $this->getMediaObjectPersistence()->remove($mediaType);
    }

    public function create(MediaInterface $media)
    {
        $className = $this->getClassName();

        $class = new $className();
        $class->setMedia($media);

        $media->setMediaType($class);

        return $class;
    }

    /**
     * Get the object persistence
     *
     * @return MediaObjectPersistenceInterface
     */
    protected abstract function getMediaObjectPersistence();
}