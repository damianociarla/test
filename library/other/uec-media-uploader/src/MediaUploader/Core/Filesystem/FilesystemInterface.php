<?php

namespace UEC\MediaUploader\Core\Filesystem;

interface FilesystemInterface
{
    public function put($path, $contents);

    public function writeStream($path, $stream);

    public function read($path);

    public function exists($path);

    public function delete($path);
}