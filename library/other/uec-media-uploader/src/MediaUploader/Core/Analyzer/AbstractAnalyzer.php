<?php

namespace UEC\MediaUploader\Core\Analyzer;

abstract class AbstractAnalyzer implements AnalyzerInterface
{
    protected $fileInfo;

    public function getFileInfo($info = null)
    {
        if (null !== $info) {
            if (isset($this->fileInfo[$info])) {
                return $this->fileInfo[$info];
            }
            return null;
        }

        return $this->fileInfo;
    }
}