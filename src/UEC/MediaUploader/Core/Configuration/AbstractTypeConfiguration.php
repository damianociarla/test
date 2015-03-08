<?php

namespace UEC\MediaUploader\Core\Configuration;

use UEC\MediaUploader\Core\Analyzer\AnalyzerInterface;
use UEC\MediaUploader\Core\CDN\CDNInterface;
use UEC\MediaUploader\Core\Initializer\InitializerInterface;
use UEC\MediaUploader\Core\Model\MediaTypeManagerInterface;
use UEC\MediaUploader\Core\Adapter\AdapterManagerInterface;

abstract class AbstractTypeConfiguration implements TypeConfigurationInterface
{
    protected $mediaTypeManager;
    protected $adapterManager;
    protected $cdn;
    protected $initializer;
    protected $analyzer;

    function __construct(
        MediaTypeManagerInterface $mediaTypeManager,
        AdapterManagerInterface $adapterManager,
        CDNInterface $cdn,
        InitializerInterface $initializer,
        AnalyzerInterface $analyzer
    ) {
        $this->mediaTypeManager = $mediaTypeManager;
        $this->adapterManager = $adapterManager;
        $this->cdn = $cdn;
        $this->initializer = $initializer;
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

    public function getInitializer()
    {
        return $this->initializer;
    }

    public function getAnalyzer()
    {
        return $this->analyzer;
    }
}