<?php

namespace UEC\MediaUploader\Core\Filesystem;

interface PathGeneratorInterface
{
    /**
     * Generate path from instance of MediaInterface
     *
     * @param string $context
     * @param string $originalPath
     * @return string
     */
    public function generate($context, $originalPath);
}