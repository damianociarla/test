<?php

namespace UEC\MediaUploader\Type\Embed\Parser;

interface ParserInterface
{
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