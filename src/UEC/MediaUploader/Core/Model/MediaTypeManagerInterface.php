<?php

namespace UEC\MediaUploader\Core\Model;

interface MediaTypeManagerInterface
{
    /**
     * Create or update an instance of MediaTypeInterface
     *
     * @param MediaTypeInterface $mediaType
     */
    public function save(MediaTypeInterface $mediaType);

    /**
     * Remove an instance of MediaTypeInterface
     *
     * @param MediaTypeInterface $mediaType
     */
    public function remove(MediaTypeInterface $mediaType);

    /**
     * Create a new empty instance of MediaTypeInterface
     *
     * @param MediaInterface $media
     * @return MediaTypeInterface
     */
    public function create(MediaInterface $media);

    /**
     * Find single media type by media
     *
     * @param MediaInterface $media
     * @return MediaTypeInterface
     */
    public function findByMedia(MediaInterface $media);

    /**
     * Get path of the Media class
     *
     * @return string
     */
    public function getClassName();

    /**
     * Check if the instance of MediaTypeInterface is persisted
     *
     * @param MediaTypeInterface $mediaType
     * @return bool
     */
    public function isNewMediaType(MediaTypeInterface $mediaType);
}