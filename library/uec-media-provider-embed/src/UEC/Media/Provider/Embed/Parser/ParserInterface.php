<?php

namespace UEC\Media\Provider\Embed\Parser;

interface ParserInterface
{
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

    /**
     * Parse an url and return an array
     *
     * <code>
     * null|string  title
     * null|string  description
     * null|string  url
     * null|string  type
     * null|string  thumbnail
     * null|integer thumbnail_width
     * null|integer thumbnail_height
     * null|string  html
     * null|integer width
     * null|integer height
     * null|string  author_name
     * null|string  author_url
     * null|string  provider_name
     * null|string  provider_url
     * </code>
     *
     * @param string $url
     * @return array
     */
    public function parse($url);
}