<?php

namespace UEC\MediaUploader\Core\Analyzer;

use UEC\MediaUploader\Core\Uploader\UploadAdapterInterface;

interface AnalyzerInterface
{
    /**
     * Scans the file
     *
     * @param UploadAdapterInterface $adapter
     */
    public function analyze(UploadAdapterInterface $adapter);

    /**
     * Get the info of the file
     *
     * @param null|string $info
     * @return array|mixed
     */
    public function getFileInfo($info = null);
}