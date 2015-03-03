<?php

namespace UEC\MediaUploader\Core\Filesystem;

interface FilenameGeneratorInterface
{
    /**
     * Generate filename from instance of MediaInterface
     *
     * @param string $context
     * @param string $originalPath
     * @return string
     */
    public function generate($context, $originalPath);
}