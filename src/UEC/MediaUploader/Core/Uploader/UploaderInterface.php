<?php

namespace UEC\MediaUploader\Core\Uploader;

use UEC\MediaUploader\Core\Analyzer\AnalyzerInterface;
use UEC\MediaUploader\Core\Filesystem\FilesystemInterface;
use UEC\MediaUploader\Core\Filesystem\FilenameGeneratorInterface;
use UEC\MediaUploader\Core\Filesystem\PathGeneratorInterface;

interface UploaderInterface
{
    /**
     * Set filesystem
     *
     * @param FilesystemInterface $filesystem
     * @return UploaderInterface
     */
    public function setFilesystem(FilesystemInterface $filesystem);

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
     * Get filesystem
     *
     * @return FilesystemInterface
     */
    public function getFilesystem();

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