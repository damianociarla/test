<?php

namespace UEC\MediaUploader\Core\Model;

interface MediaManagerInterface
{
    /**
     * Create or update an instance of MediaInterface
     *
     * @param MediaInterface $media
     */
    public function save(MediaInterface $media);

    /**
     * Remove an instance of MediaInterface
     *
     * @param MediaInterface $media
     */
    public function remove(MediaInterface $media);

    /**
     * Create a new empty instance of MediaInterface
     *
     * @param string $context
     * @return MediaInterface
     */
    public function create($context = null);

    /**
     * Find media by id
     *
     * @param int $id
     * @return null|MediaInterface
     */
    public function findById($id);

    /**
     * Get path of the Media class
     *
     * @return string
     */
    public function getClassName();

    /**
     * Check if the instance of MediaInterface is persisted
     *
     * @param MediaInterface $media
     * @return bool
     */
    public function isNewMedia(MediaInterface $media);
}