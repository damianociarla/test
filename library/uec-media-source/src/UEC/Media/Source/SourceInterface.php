<?php

namespace UEC\Media\Source;

interface SourceInterface
{
    /**
     * Get source
     *
     * @return mixed
     */
    public function getSource();

    /**
     * Get content
     *
     * @return mixed
     */
    public function getContent();
}