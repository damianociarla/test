<?php

namespace UEC\Media\Reader;

use UEC\Media\UriInterface;

interface ReaderInterface
{
    /**
     * Get uri
     *
     * @return UriInterface
     */
    public function getUri();

    /**
     * Scan uri
     */
    public function read();
}