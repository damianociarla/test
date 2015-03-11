<?php

namespace UEC\Media;

use UEC\Media\Reader\ReaderInterface;

interface MediaInterface
{
    /**
     * Get reader
     *
     * @return ReaderInterface
     */
    public function getReader();

    /**
     * Get isValid
     *
     * @return bool
     */
    public function isValid();

    /**
     * Set isValid
     *
     * @param bool $isValid
     * @return MediaInterface
     */
    public function setIsValid($isValid);
}