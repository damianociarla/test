<?php

namespace UEC\Media;

interface RemoteUriInterface
{
    /**
     * Get status code
     *
     * @return int
     */
    public function getHttpStatusCode();
}