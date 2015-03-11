<?php

namespace UEC\Media\Reader;

use UEC\Media\UriInterface;

interface ReaderInterface
{
    /**
     * Check if reader support the uri
     *
     * @param UriInterface $uri
     * @return bool
     */
    public function supports(UriInterface $uri);

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