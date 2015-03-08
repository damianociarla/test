<?php

namespace UEC\MediaUploader\Core\Model;

use UEC\MediaUploader\Core\Persistence\MediaObjectPersistenceInterface;
use UEC\MediaUploader\Core\Persistence\MediaObjectRepository;
use UEC\MediaUploader\Core\Resolver\ResolverMediaTypeInterface;

abstract class AbstractMediaManager implements MediaManagerInterface
{
    protected $resolverMediaType;

    function __construct(ResolverMediaTypeInterface $resolverMediaType)
    {
        $this->resolverMediaType = $resolverMediaType;
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
        $class->setResolverMediaType($this->resolverMediaType);

        return $class;
    }

    /**
     * Get the object persistence
     *
     * @return MediaObjectPersistenceInterface
     */
    protected abstract function getMediaObjectPersistence();
}