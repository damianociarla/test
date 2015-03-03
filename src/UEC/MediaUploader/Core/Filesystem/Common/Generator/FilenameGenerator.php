<?php

namespace UEC\MediaUploader\Core\Filesystem\Common\Generator;

use UEC\MediaUploader\Core\Filesystem\FilenameGeneratorInterface;

class FilenameGenerator implements FilenameGeneratorInterface
{
    public function generate($context, $originalPath)
    {
        $ext = pathinfo($originalPath, PATHINFO_EXTENSION);
        return sprintf('%s_%s_%s.%s', $context, sha1_file($originalPath), uniqid(), $ext);
    }
}