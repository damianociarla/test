<?php

namespace UEC\MediaUploader\Core\Filesystem\Common\Generator;

use UEC\MediaUploader\Core\Filesystem\FilenameGeneratorInterface;

class FilenameGenerator implements FilenameGeneratorInterface
{
    public function generate($context, $originalPath)
    {
        if (!$pathEncode = @sha1_file($originalPath)) {
            $pathEncode = @sha1($originalPath);
        }

        $ext = pathinfo($originalPath, PATHINFO_EXTENSION);
        return sprintf('%s_%s_%s.%s', $context, $pathEncode, uniqid(), $ext);
    }
}