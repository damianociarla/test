<?php

namespace UEC\MediaUploader\Extension\PdfImageExtractor\Extractor;

interface ExtractorInterface
{
    /**
     * Extracts a specific page and save it as image file
     *
     * @param string $path
     * @param int $pageNumber
     * @param int $quality
     * @param string $output
     * @return boolean
     */
    public function extractPageFromPdf($path, $pageNumber, $quality, $output);
}