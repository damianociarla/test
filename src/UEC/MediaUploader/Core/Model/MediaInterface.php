<?php

namespace UEC\MediaUploader\Core\Model;

use UEC\MediaUploader\Core\Resolver\ResolverMediaTypeInterface;

interface MediaInterface
{
    /**
     * Get id
     *
     * @return int
     */
    public function getId();

    /**
     * Get context
     *
     * @return string
     */
    public function getContext();

    /**
     * Set context
     *
     * @param string $context
     * @return MediaInterface
     */
    public function setContext($context);

    /**
     * Get originalPath
     *
     * @return string
     */
    public function getOriginalPath();

    /**
     * Set originalPath
     *
     * @param string $originalPath
     * @return MediaInterface
     */
    public function setOriginalPath($originalPath);

    /**
     * Get path
     *
     * @return string
     */
    public function getPath();

    /**
     * Set path
     *
     * @param string $path
     * @return MediaInterface
     */
    public function setPath($path);

    /**
     * Set resolverMediaType
     *
     * @param ResolverMediaTypeInterface $resolverMediaType
     * @return Media
     */
    public function setResolverMediaType(ResolverMediaTypeInterface $resolverMediaType);

    /**
     * Set mediaType
     *
     * @param MediaTypeInterface $mediaType
     * @return MediaInterface
     */
    public function setMediaType(MediaTypeInterface $mediaType = null);

    /**
     * Get mediaType
     *
     * @return MediaTypeInterface
     */
    public function getMediaType();

    /**
     * Check if path is modified
     *
     * @return bool
     */
    public function isNewPath();
}