<?php

namespace UEC\Media;

use UEC\Media\Reader\ReaderInterface;

class MediaFactory implements MediaFactoryInterface
{
    function __construct()
    {
        // Se servono dipendenze si mettono qui
    }

    public static function createFromReader(ReaderInterface $reader)
    {
        return new Media($reader);
    }
}