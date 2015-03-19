<?php

namespace UEC\Media\Reader;

interface RemoteReaderInterface extends ReaderInterface
{
    /**
     * Get contentType
     *
     * @return string
     */
    public function getContentType();
}