<?php

namespace UEC\Media\Adapter\Common;
use UEC\Media\Adapter\AdapterContentInterface;

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