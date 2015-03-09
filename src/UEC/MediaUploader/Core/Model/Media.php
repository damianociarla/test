<?php

namespace UEC\MediaUploader\Core\Model;

use UEC\MediaUploader\Core\Resolver\MediaTypeResolverInterface;

abstract class Media implements MediaInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * Key of context
     *
     * @var string
     */
    protected $context;

    /**
     * Not mapped. Represents the path of the original media.
     * When the instance of the media is retrieved this variable takes the value of $path
     *
     * @var string
     */
    protected $originalPath;

    /**
     * Absolute path of media
     *
     * @var string
     */
    protected $path;

    /**
     * Not mapped. Injected
     *
     * @var MediaTypeResolverInterface
     */
    protected $mediaTypeResolver;

    /**
     * Not mapped
     *
     * @var MediaTypeInterface
     */
    protected $mediaType;

    function __construct($context = null)
    {
        $this->context = $context;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getContext()
    {
        return $this->context;
    }

    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }

    public function getOriginalPath()
    {
        return $this->originalPath;
    }

    public function setOriginalPath($originalPath)
    {
        $this->originalPath = $originalPath;
        return $this;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setPath($path)
    {
        if (null === $this->originalPath) {
            $this->setOriginalPath($path);
        }

        $this->path = $path;
        return $this;
    }

    public function setMediaTypeResolver(MediaTypeResolverInterface $mediaTypeResolver)
    {
        $this->mediaTypeResolver = $mediaTypeResolver;
    }

    public function setMediaType(MediaTypeInterface $mediaType = null)
    {
        $this->mediaType = $mediaType;
        return $this;
    }

    public function getMediaType()
    {
        if (null === $this->mediaType &&
            null !== $this->mediaTypeResolver &&
            null !== $this->id
        ) {
            $this->mediaType = $this->mediaTypeResolver->resolve($this);
        }

        return $this->mediaType;
    }

    public function isNewPath()
    {
        return $this->originalPath !== $this->path;
    }
}