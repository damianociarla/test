<?php

namespace UEC\MediaUploader\Type\Pdf\Parser;

interface PdfParserInterface
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

    /**
     * Get the numbers of pages
     *
     * @param string $file
     * @return int
     */
    public function getNumberOfPages($file);
}
