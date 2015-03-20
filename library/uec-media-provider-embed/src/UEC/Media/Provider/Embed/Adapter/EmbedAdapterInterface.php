<?php

namespace UEC\Media\Provider\Embed\Adapter;

use UEC\Media\Provider\Embed\Parser\ParserInterface;

interface EmbedAdapterInterface
{
    /**
     * Set parser
     *
     * @param ParserInterface $parser
     * @return EmbedAdapterInterface
     */
    public function setParser(ParserInterface $parser);
}