<?php

namespace UEC\MediaUploader\Core\CDN;

interface CDNInterface
{
    public function put($path, $contents);

    public function writeStream($path, $stream);

    public function read($path);

    public function exists($path);

    public function delete($path);
}