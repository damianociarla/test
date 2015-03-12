<?php

namespace UEC\Media;

interface UriInterface
{
    /**
     * Get value
     *
     * @return mixed
     */
    public function getValue();

    /**
     * Check if value is valid
     *
     * @return bool
     */
    public function isValid();

    function __toString();
}