<?php

namespace UEC\MediaUploader\Core\Model;

use UEC\MediaUploader\Core\Persistence\MediaObjectPersistenceInterface;
use UEC\MediaUploader\Core\Persistence\MediaObjectRepository;
use UEC\MediaUploader\Core\Resolver\MediaTypeResolverInterface;

abstract class AbstractMediaManager implements MediaManagerInterface
{
    protected $mediaTypeResolver;

    function __construct(MediaTypeResolverInterface $mediaTypeResolver)
    {
        $this->mediaTypeResolver = $mediaTypeResolver;
    }

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

        $class = new $className($context);
        $class->setMediaTypeResolver($this->mediaTypeResolver);

        return $class;
    }

    /**
     * Get the object persistence
     *
     * @return MediaObjectPersistenceInterface
     */
    protected abstract function getMediaObjectPersistence();
}