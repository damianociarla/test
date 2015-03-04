<?php

namespace UEC\MediaUploader\Core\Uploader\Common;

use UEC\MediaUploader\Core\Analyzer\AnalyzerInterface;
use UEC\MediaUploader\Core\Uploader\AbstractUploader;
use UEC\MediaUploader\Core\Uploader\UploadAdapterContentInterface;
use UEC\MediaUploader\Core\Uploader\UploadAdapterInterface;
use UEC\MediaUploader\Core\Uploader\UploadAdapterStreamInterface;

class SimpleUploader extends AbstractUploader
{
    public function save($context, UploadAdapterInterface $adapter, AnalyzerInterface $analyzer)
    {
        if ($adapter instanceof UploadAdapterContentInterface) {
            $finalPath = $this->generateFinalPath($context, $adapter);
            $this->filesystem->put($finalPath, file_get_contents($adapter->getPath()));
        } elseif ($adapter instanceof UploadAdapterStreamInterface) {
            $finalPath = $this->generateFinalPath($context, $adapter);
            $stream = fopen($adapter->getPath(), 'r+');
            $this->filesystem->writeStream($finalPath, $stream);
            fclose($stream);
        } else {
            $finalPath = $adapter->getPath();
        }

        return $finalPath;
    }

    protected function generateFinalPath($context, UploadAdapterInterface $adapter)
    {
        return sprintf('%s/%s',
            $this->pathGenerator->generate($context, $adapter->getPath()),
            $this->filenameGenerator->generate($context, $adapter->getPath())
        );
    }
}