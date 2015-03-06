<?php

namespace UEC\MediaUploader\Core\Configuration;

use UEC\MediaUploader\Core\Analyzer\AnalyzerInterface;
use UEC\MediaUploader\Core\CDN\CDNInterface;
use UEC\MediaUploader\Core\Initializer\InitializerInterface;
use UEC\MediaUploader\Core\Model\MediaTypeManagerInterface;
use UEC\MediaUploader\Core\Services\MediaServiceInterface;

abstract class AbstractTypeConfiguration implements TypeConfigurationInterface
{
    protected $mediaTypeManager;
    protected $mediaService;
    protected $cdn;
    protected $initializer;
    protected $analyzer;

    function __construct(
        MediaTypeManagerInterface $mediaTypeManager,
        MediaServiceInterface $mediaService,
        CDNInterface $cdn,
        InitializerInterface $initializer,
        AnalyzerInterface $analyzer
    ) {
        $this->mediaTypeManager = $mediaTypeManager;
        $this->mediaService = $mediaService;
        $this->cdn = $cdn;
        $this->initializer = $initializer;
        $this->analyzer = $analyzer;
    }

    public function getMediaTypeManager()
    {
        return $this->mediaTypeManager;
    }

    public function getMediaService()
    {
        return $this->mediaService;
    }

    public function getCDN()
    {
        return $this->cdn;
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