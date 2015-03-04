<?php

namespace UEC\MediaUploader\Core\Services;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;
use UEC\MediaUploader\Core\Analyzer\AnalyzerInterface;
use UEC\MediaUploader\Core\Filesystem\FilenameGeneratorInterface;
use UEC\MediaUploader\Core\Filesystem\FilesystemInterface;
use UEC\MediaUploader\Core\Filesystem\PathGeneratorInterface;

interface MediaServiceInterface
{
    /**
     * Get filesystem
     *
     * @return FilesystemInterface
     */
    public function getFilesystem();

    /**
     * Set filesystem
     *
     * @param FilesystemInterface $filesystem
     * @return MediaServiceInterface
     */
    public function setFilesystem(FilesystemInterface $filesystem);

    /**
     * Get filenameGenerator
     *
     * @return FilenameGeneratorInterface
     */
    public function getFilenameGenerator();

    /**
     * Set filenameGenerator
     *
     * @param FilenameGeneratorInterface $filenameGenerator
     * @return MediaServiceInterface
     */
    public function setFilenameGenerator(FilenameGeneratorInterface $filenameGenerator);

    /**
     * Get pathGenerator
     *
     * @return PathGeneratorInterface
     */
    public function getPathGenerator();

    /**
     * Set pathGenerator
     *
     * @param PathGeneratorInterface $pathGenerator
     * @return MediaServiceInterface
     */
    public function setPathGenerator(PathGeneratorInterface $pathGenerator);

    /**
     * Execute the saving of the adapter
     *
     * @param string $context
     * @param AdapterInterface $adapter
     * @param AnalyzerInterface $analyzer
     * @return string new file path
     */
    public function save($context, AdapterInterface $adapter, AnalyzerInterface $analyzer);
}