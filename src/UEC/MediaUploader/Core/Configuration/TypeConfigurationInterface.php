<?php

namespace UEC\MediaUploader\Core\Configuration;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;
use UEC\MediaUploader\Core\Analyzer\AnalyzerInterface;
use UEC\MediaUploader\Core\Initializer\InitializerInterface;
use UEC\MediaUploader\Core\Model\MediaTypeManagerInterface;
use UEC\MediaUploader\Core\Services\MediaServiceInterface;

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
     * @return MediaServiceInterface
     */
    public function getMediaService();

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

    /**
     * Check if a configuration support an adapter
     *
     * @param AdapterInterface $adapter
     * @return false
     */
    public function supports(AdapterInterface $adapter);

    /**
     * Get the list of the adapters supported from configuration
     *
     * @return array
     */
    public function getSupportedAdapters();
}