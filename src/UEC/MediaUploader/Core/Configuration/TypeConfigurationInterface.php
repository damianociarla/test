<?php

namespace UEC\MediaUploader\Core\Configuration;

use UEC\MediaUploader\Core\Analyzer\AnalyzerInterface;
use UEC\MediaUploader\Core\Initializer\InitializerInterface;
use UEC\MediaUploader\Core\Model\MediaTypeManagerInterface;
use UEC\MediaUploader\Core\Uploader\UploaderInterface;

interface TypeConfigurationInterface
{
    /**
     * Get the media type manager
     *
     * @return MediaTypeManagerInterface
     */
    public function getMediaTypeManager();

    /**
     * Get uploader manager
     *
     * @return UploaderInterface
     */
    public function getUploader();

    /**
     * Get the initializer
     *
     * @return InitializerInterface
     */
    public function getInitializer();

    /**
     * Get the analyzer
     *
     * @return AnalyzerInterface
     */
    public function getAnalyzer();

    /**
     * Get default validator to associate at the adapter
     *
     * @return array
     */
    public function getDefaultValidators();
}