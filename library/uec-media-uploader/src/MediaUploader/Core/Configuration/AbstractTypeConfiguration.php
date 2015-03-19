<?php

namespace UEC\MediaUploader\Core\Configuration;

use UEC\MediaUploader\Core\Adapter\AdapterManagerInterface;
use UEC\MediaUploader\Core\Analyzer\AnalyzerInterface;
use UEC\MediaUploader\Core\CDN\CDNInterface;
use UEC\MediaUploader\Core\Initializer\MediaInitializerInterface;
use UEC\MediaUploader\Core\Model\MediaTypeManagerInterface;

abstract class AbstractTypeConfiguration implements TypeConfigurationInterface
{
    protected $mediaTypeManager;
    protected $adapterManager;
    protected $cdn;
    protected $mediaInitializer;
    protected $analyzer;

    function __construct(
        MediaTypeManagerInterface $mediaTypeManager,
        AdapterManagerInterface $adapterManager,
        CDNInterface $cdn,
        MediaInitializerInterface $mediaInitializer,
        AnalyzerInterface $analyzer
    ) {
        $this->mediaTypeManager = $mediaTypeManager;
        $this->adapterManager = $adapterManager;
        $this->cdn = $cdn;
        $this->mediaInitializer = $mediaInitializer;
        $this->analyzer = $analyzer;
    }

    public function getMediaTypeManager()
    {
        return $this->mediaTypeManager;
    }

    public function getAdapterManager()
    {
        return $this->adapterManager;
    }

    public function getCDN()
    {
        return $this->cdn;
    }

    public function getMediaInitializer()
    {
        return $this->mediaInitializer;
    }

    public function getAnalyzer()
    {
        return $this->analyzer;
    }
}