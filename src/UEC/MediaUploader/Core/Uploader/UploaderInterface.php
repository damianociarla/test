<?php

namespace UEC\MediaUploader\Core\Uploader;

use UEC\MediaUploader\Core\Analyzer\AnalyzerInterface;
use UEC\MediaUploader\Core\CDN\CDNInterface;
use UEC\MediaUploader\Core\Filesystem\FilenameGeneratorInterface;
use UEC\MediaUploader\Core\Filesystem\PathGeneratorInterface;

interface UploaderInterface
{
    /**
     * Set cdn
     *
     * @param CDNInterface $cdn
     * @return UploaderInterface
     */
    public function setCdn($cdn);

    /**
     * Set filenameGenerator
     *
     * @param FilenameGeneratorInterface $filenameGenerator
     * @return UploaderInterface
     */
    public function setFilenameGenerator($filenameGenerator);

    /**
     * Set pathGenerator
     *
     * @param PathGeneratorInterface $pathGenerator
     * @return UploaderInterface
     */
    public function setPathGenerator($pathGenerator);

    public function upload($context, UploadAdapterInterface $adapter, AnalyzerInterface $analyzer);
}