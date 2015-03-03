<?php

namespace UEC\MediaUploader\Core\Persistence;

interface MediaObjectPersistenceInterface
{
    /**
     * Persist an object
     *
     * @param mixed $object
     */
    public function persist($object);

    /**
     * Remove an object
     *
     * @param mixed $object
     */
    public function remove($object);

    /**
     * Check if an object is persisted
     *
     * @param mixed $object
     * @return bool
     */
    public function isNew($object);
}