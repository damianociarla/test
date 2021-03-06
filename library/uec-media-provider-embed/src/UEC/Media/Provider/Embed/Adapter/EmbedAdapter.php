<?php

namespace UEC\Media\Provider\Embed\Adapter;

use UEC\Media\Adapter\AbstractAdapter;
use UEC\Media\Provider\Embed\Parser\ParserInterface;
use UEC\Media\Provider\Embed\Source\RemoteSourceInterface;
use UEC\Media\Source\SourceInterface;

class EmbedAdapter extends AbstractAdapter implements EmbedAdapterInterface
{
    private $parser;
    private $result;

    public function setParser(ParserInterface $parser)
    {
        $this->parser = $parser;
    }

    protected function supports(SourceInterface $source)
    {
        return $source instanceof RemoteSourceInterface;
    }

    private function getInfo($type)
    {
        if (null === $this->parser) {
            throw new \Exception('Parser must be set');
        }

        if (null === $this->result) {
            $this->result = $this->parser->parse($this->source->getSource());
        }

        return $this->result[$type];
    }

    public function getType()
    {
        return $this->getInfo(ParserInterface::INFO_TYPE);
    }

    public function getTitle()
    {
        return $this->getInfo(ParserInterface::INFO_TITLE);
    }

    public function getDescription()
    {
        return $this->getInfo(ParserInterface::INFO_DESCRIPTION);
    }

    public function getUrl()
    {
        return $this->getInfo(ParserInterface::INFO_URL);
    }

    public function getThumbnailUrl()
    {
        return $this->getInfo(ParserInterface::INFO_THUMBNAIL_URL);
    }

    public function getThumbnailWidth()
    {
        return $this->getInfo(ParserInterface::INFO_THUMBNAIL_WIDTH);
    }

    public function getThumbnailHeight()
    {
        return $this->getInfo(ParserInterface::INFO_THUMBNAIL_HEIGHT);
    }

    public function getHtml()
    {
        return $this->getInfo(ParserInterface::INFO_HTML);
    }

    public function getWidth()
    {
        return $this->getInfo(ParserInterface::INFO_WIDTH);
    }

    public function getHeight()
    {
        return $this->getInfo(ParserInterface::INFO_HEIGHT);
    }

    public function getAuthorName()
    {
        return $this->getInfo(ParserInterface::INFO_AUTHOR_NAME);
    }

    public function getAuthorUrl()
    {
        return $this->getInfo(ParserInterface::INFO_AUTHOR_URL);
    }

    public function getProviderName()
    {
        return $this->getInfo(ParserInterface::INFO_PROVIDER_NAME);
    }

    public function getProviderUrl()
    {
        return $this->getInfo(ParserInterface::INFO_PROVIDER_URL);
    }
}