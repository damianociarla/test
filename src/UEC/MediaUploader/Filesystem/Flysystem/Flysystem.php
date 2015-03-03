<?php

namespace UEC\MediaUploader\Filesystem\Flysystem;

use UEC\MediaUploader\Core\Filesystem\FilesystemInterface;
use League\Flysystem\FilesystemInterface as FlysystemFilesystemInterface;

class Flysystem implements FilesystemInterface
{
    protected $filesystem;

    function __construct(FlysystemFilesystemInterface $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function put($path, $contents)
    {
        $this->filesystem->put($path, $contents);
    }

    public function writeStream($path, $stream)
    {
        $this->filesystem->writeStream($path, $stream);
    }

    public function read($path)
    {
        $this->filesystem->read($path);
    }

    public function exists($path)
    {
        $this->filesystem->has($path);
    }

    public function delete($path)
    {
        $this->filesystem->delete($path);
    }
}