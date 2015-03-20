<?php

namespace UEC\MediaUploader\Core\Model;

use UEC\MediaUploader\Core\Resolver\MediaTypeResolverInterface;

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
     * Set mediaTypeResolver
     *
     * @param MediaTypeResolverInterface $mediaTypeResolver
     * @return Media
     */
    public function setMediaTypeResolver(MediaTypeResolverInterface $mediaTypeResolver);

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