<?php

namespace UEC\MediaUploader\Core\Uploader\Common;

use UEC\MediaUploader\Core\Analyzer\AnalyzerInterface;
use UEC\MediaUploader\Core\Uploader\AbstractUploader;
use UEC\MediaUploader\Core\Uploader\UploadAdapterInterface;

class SimpleUploader extends AbstractUploader
{
    public function upload($context, UploadAdapterInterface $adapter, AnalyzerInterface $analyzer)
    {
        $finalPath = sprintf('%s/%s',
            $this->pathGenerator->generate($context, $adapter->getPath()),
            $this->filenameGenerator->generate($context, $adapter->getPath())
        );

        $adapter->upload($this->cdn, $finalPath);

        return $finalPath;
    }
}