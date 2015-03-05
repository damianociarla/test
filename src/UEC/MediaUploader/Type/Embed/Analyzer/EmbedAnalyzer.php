<?php

namespace UEC\MediaUploader\Type\Embed\Analyzer;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;
use UEC\MediaUploader\Core\Analyzer\AbstractAnalyzer;
use UEC\MediaUploader\Type\Embed\Parser\ParserInterface;

class EmbedAnalyzer extends AbstractAnalyzer
{
    protected $parser;

    function __construct(ParserInterface $parser)
    {
        $this->parser = $parser;
    }

    const INFO_TYPE             = 'type';
    const INFO_TITLE            = 'title';
    const INFO_DESCRIPTION      = 'description';
    const INFO_URL              = 'url';
    const INFO_THUMBNAIL_URL    = 'thumbnail_url';
    const INFO_THUMBNAIL_WIDTH  = 'thumbnail_width';
    const INFO_THUMBNAIL_HEIGHT = 'thumbnail_height';
    const INFO_HTML             = 'html';
    const INFO_WIDTH            = 'width';
    const INFO_HEIGHT           = 'height';
    const INFO_AUTHOR_NAME      = 'author_name';
    const INFO_AUTHOR_URL       = 'author_url';
    const INFO_PROVIDER_NAME    = 'provider_name';
    const INFO_PROVIDER_URL     = 'provider_url';

    public function analyze(AdapterInterface $adapter)
    {
        $this->fileInfo = $this->parser->parse($adapter->getPath());
    }
}