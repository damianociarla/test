<?php

namespace UEC\MediaUploader\Core\Filesystem\Common\Generator;

use UEC\MediaUploader\Core\Filesystem\PathGeneratorInterface;

class PathGenerator implements PathGeneratorInterface
{
    public function generate($context, $originalPath)
    {
        $date = new \DateTime();
        return sprintf('%s/%s/%s/%s', $context, $date->format('Y'), $date->format('m'), $date->format('d'));
    }
}