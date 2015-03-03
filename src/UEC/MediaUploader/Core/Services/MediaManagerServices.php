<?php

namespace UEC\MediaUploader\Core\Services;

use UEC\MediaUploader\Core\Analyzer\AnalyzerInterface;
use UEC\MediaUploader\Core\CDN\CDNInterface;
use UEC\MediaUploader\Core\Filesystem\FilenameGeneratorInterface;
use UEC\MediaUploader\Core\Filesystem\PathGeneratorInterface;
use UEC\MediaUploader\Core\Initializer\InitializerInterface;
use UEC\MediaUploader\Core\Model\MediaTypeManagerInterface;
use UEC\MediaUploader\Core\Uploader\UploaderInterface;

abstract class MediaManagerServices implements MediaManagerServicesInterface
{
    protected $mediaTypeManager;
    protected $uploader;
    protected $initializer;
    protected $analyzer;

    function __construct(
        MediaTypeManagerInterface $mediaTypeManager,
        UploaderInterface $uploader,
        InitializerInterface $initializer,
        AnalyzerInterface $analyzer
    ) {
        $this->mediaTypeManager = $mediaTypeManager;
        $this->uploader = $uploader;
        $this->initializer = $initializer;
        $this->analyzer = $analyzer;
    }

    public function getMediaTypeManager()
    {
        return $this->mediaTypeManager;
    }

    public function getUploader()
    {
        return $this->uploader;
    }

    public function getInitializer()
    {
        return $this->initializer;
    }

    public function getAnalyzer()
    {
        return $this->analyzer;
    }
}