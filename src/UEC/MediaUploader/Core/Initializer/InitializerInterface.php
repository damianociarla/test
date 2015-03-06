<?php

namespace UEC\MediaUploader\Core\Initializer;

use UEC\MediaUploader\Core\Analyzer\AnalyzerInterface;
use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Core\Model\MediaTypeInterface;

interface InitializerInterface
{
    /**
     * Execute initial operations to fill the fields of $mediaType
     *
     * @param MediaInterface $media
     * @param AnalyzerInterface $analyzer
     */
    public function initializeMedia(MediaInterface $media, AnalyzerInterface $analyzer);

    /**
     * Execute initial operations to fill the fields of $mediaType
     *
     * @param MediaTypeInterface $mediaType
     * @param AnalyzerInterface $analyzer
     */
    public function initializeMediaType(MediaTypeInterface $mediaType, AnalyzerInterface $analyzer);
}