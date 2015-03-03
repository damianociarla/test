<?php

namespace UEC\MediaUploader\Core\CDN\Common;

use League\Flysystem\FilesystemInterface;
use UEC\MediaUploader\Core\CDN\CDNInterface;

class Flysystem implements CDNInterface
{
    protected $filesystem;

    function __construct(FilesystemInterface $filesystem)
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