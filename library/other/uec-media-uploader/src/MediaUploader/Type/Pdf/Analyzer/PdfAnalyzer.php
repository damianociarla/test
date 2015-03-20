<?php

namespace UEC\MediaUploader\Type\Pdf\Analyzer;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;
use UEC\MediaUploader\Core\Analyzer\AbstractAnalyzer;
use UEC\MediaUploader\Type\Pdf\Parser\ParserInterface;

class PdfAnalyzer extends AbstractAnalyzer
{
    private $parser;

    const INFO_SIZE     = 'size';
    const INFO_TOT_PAGE = 'tot_page';

    function __construct(ParserInterface $parser)
    {
        $this->parser = $parser;
    }

    public function analyze(AdapterInterface $adapter)
    {
        $this->fileInfo = array(
            self::INFO_SIZE     => $adapter->getSize(),
            self::INFO_TOT_PAGE => $this->parser->getNumberOfPages($adapter->getPath()),
        );
    }
}