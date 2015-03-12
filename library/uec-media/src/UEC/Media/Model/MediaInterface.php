<?php

namespace UEC\Media\Model;

interface MediaInterface
{
    /**
     * Get uri
     *
     * @return string
     */
    public function getUri();

    /**
     * Set uri
     *
     * @param string $uri
     * @return MediaInterface
     */
    public function setUri($uri);
}