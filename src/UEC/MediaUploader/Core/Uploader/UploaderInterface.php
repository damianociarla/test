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
    public function setCdn(CDNInterface $cdn);

    /**
     * Set filenameGenerator
     *
     * @param FilenameGeneratorInterface $filenameGenerator
     * @return UploaderInterface
     */
    public function setFilenameGenerator(FilenameGeneratorInterface $filenameGenerator);

    /**
     * Set pathGenerator
     *
     * @param PathGeneratorInterface $pathGenerator
     * @return UploaderInterface
     */
    public function setPathGenerator(PathGeneratorInterface $pathGenerator);

    /**
     * Get cdn
     *
     * @return CDNInterface
     */
    public function getCdn();

    /**
     * Get filenameGenerator
     *
     * @return FilenameGeneratorInterface
     */
    public function getFilenameGenerator();

    /**
     * Get pathGenerator
     *
     * @return PathGeneratorInterface
     */
    public function getPathGenerator();

    public function upload($context, UploadAdapterInterface $adapter, AnalyzerInterface $analyzer);
}