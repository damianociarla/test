<?php

namespace UEC\Media\Adapter;

use UEC\MediaUploader\Core\Filesystem\FilenameGeneratorInterface;
use UEC\MediaUploader\Core\Filesystem\FilesystemInterface;
use UEC\MediaUploader\Core\Filesystem\PathGeneratorInterface;

abstract class AbstractAdapterManager implements AdapterManagerInterface
{
    protected $filesystem;
    protected $filenameGenerator;
    protected $pathGenerator;

    function __construct(FilesystemInterface $filesystem, FilenameGeneratorInterface $filenameGenerator, PathGeneratorInterface $pathGenerator)
    {
        $this->filesystem = $filesystem;
        $this->filenameGenerator = $filenameGenerator;
        $this->pathGenerator = $pathGenerator;
    }

    public function getFilesystem()
    {
        return $this->filesystem;
    }

    public function setFilesystem(FilesystemInterface $filesystem)
    {
        $this->filesystem = $filesystem;
        return $this;
    }

    public function getFilenameGenerator()
    {
        return $this->filenameGenerator;
    }

    public function setFilenameGenerator(FilenameGeneratorInterface $filenameGenerator)
    {
        $this->filenameGenerator = $filenameGenerator;
        return $this;
    }

    public function getPathGenerator()
    {
        return $this->pathGenerator;
    }

    public function setPathGenerator(PathGeneratorInterface $pathGenerator)
    {
        $this->pathGenerator = $pathGenerator;
        return $this;
    }
}