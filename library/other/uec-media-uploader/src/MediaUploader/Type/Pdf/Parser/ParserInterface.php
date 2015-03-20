<?php

namespace UEC\MediaUploader\Type\Pdf\Parser;

interface ParserInterface
{
    /**
     * Get the numbers of pages
     *
     * @param string $file
     * @return int
     */
    public function getNumberOfPages($file);
}
