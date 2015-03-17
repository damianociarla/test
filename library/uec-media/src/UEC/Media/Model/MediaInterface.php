<?php

namespace UEC\Media\Model;

interface MediaInterface
{
    /**
     * Get source
     *
     * @return string
     */
    public function getSource();

    /**
     * Set source
     *
     * @param string $source
     * @return MediaInterface
     */
    public function setSource($source);
}