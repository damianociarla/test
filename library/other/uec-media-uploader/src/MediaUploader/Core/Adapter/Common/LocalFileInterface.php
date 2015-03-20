<?php

namespace UEC\MediaUploader\Core\Adapter\Common;
use UEC\MediaUploader\Core\Adapter\AdapterContentInterface;

/**
 * Interface used to represent a LocalFile
 */
interface LocalFileInterface extends AdapterContentInterface
{
    /**
     * Set removeOriginal
     *
     * @param boolean $removeOriginal
     * @return LocalFileInterface
     */
    public function setRemoveOriginal($removeOriginal);
}