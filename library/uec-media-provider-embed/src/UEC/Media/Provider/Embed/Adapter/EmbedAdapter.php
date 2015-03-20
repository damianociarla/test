<?php

namespace UEC\Media\Provider\Embed\Adapter;

use UEC\Media\Adapter\AbstractAdapter;
use UEC\Media\Provider\Embed\Parser\ParserInterface;

class EmbedAdapter extends AbstractAdapter implements EmbedAdapterInterface
{
    private $parser;

    public function setParser(ParserInterface $parser)
    {
        $this->parser = $parser;
    }

    public function extract($source)
    {
        if (null === $this->parser) {
            throw new \Exception('Parser must be set');
        }

        return $this->parser->parse($source);
    }
}