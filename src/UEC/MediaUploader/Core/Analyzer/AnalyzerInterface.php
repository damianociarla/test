<?php

namespace UEC\MediaUploader\Core\Analyzer;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;

interface AnalyzerInterface
{
    /**
     * Scans the file
     *
     * @param AdapterInterface $adapter
     */
    public function analyze(AdapterInterface $adapter);

    /**
     * Get the info of the file
     *
     * @param null|string $info
     * @return array|mixed
     */
    public function getFileInfo($info = null);
}