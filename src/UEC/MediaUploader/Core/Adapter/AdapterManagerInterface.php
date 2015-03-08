<?php

namespace UEC\MediaUploader\Core\Adapter;

use UEC\MediaUploader\Core\Filesystem\FilenameGeneratorInterface;
use UEC\MediaUploader\Core\Filesystem\FilesystemInterface;
use UEC\MediaUploader\Core\Filesystem\PathGeneratorInterface;

interface AdapterManagerInterface
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
     * @return AdapterManagerInterface
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
     * @return AdapterManagerInterface
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
     * @return AdapterManagerInterface
     */
    public function setPathGenerator(PathGeneratorInterface $pathGenerator);

    /**
     * Execute the saving of the adapter
     *
     * @param string $context
     * @param AdapterInterface $adapter
     * @return string new file path
     */
    public function save($context, AdapterInterface $adapter);
}