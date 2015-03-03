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
    protected $filenameGenerator;
    protected $pathGenerator;
    protected $cdn;
    protected $uploader;
    protected $initializer;
    protected $analyzer;

    function __construct(
        MediaTypeManagerInterface $mediaTypeManager,
        FilenameGeneratorInterface $filenameGenerator,
        PathGeneratorInterface $pathGenerator,
        CDNInterface $cdn,
        UploaderInterface $uploader,
        InitializerInterface $initializer,
        AnalyzerInterface $analyzer
    ) {
        $this->mediaTypeManager = $mediaTypeManager;
        $this->filenameGenerator = $filenameGenerator;
        $this->pathGenerator = $pathGenerator;
        $this->cdn = $cdn;
        $this->uploader = $uploader;
        $this->initializer = $initializer;
        $this->analyzer = $analyzer;
    }

    public function getMediaTypeManager()
    {
        return $this->mediaTypeManager;
    }

    public function getFilenameGenerator()
    {
        return $this->filenameGenerator;
    }

    public function getPathGenerator()
    {
        return $this->pathGenerator;
    }

    public function getCDN()
    {
        return $this->cdn;
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