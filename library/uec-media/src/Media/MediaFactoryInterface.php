<?php

namespace UEC\Media;

use UEC\Media\Reader\ReaderInterface;

interface MediaFactoryInterface
{
    /**
     * Create an istance of MediaInterface
     *
     * @param ReaderInterface $reader
     * @return MediaInterface
     */
    public static function createFromReader(ReaderInterface $reader);
}