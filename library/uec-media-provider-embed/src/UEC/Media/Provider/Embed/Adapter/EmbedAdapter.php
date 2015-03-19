<?php

namespace UEC\Media\Provider\Embed\Adapter;

use UEC\Media\Adapter\AbstractAdapter;
use UEC\Media\Provider\Embed\Parser\ParserInterface;

class EmbedAdapter extends AbstractAdapter implements EmbedAdapterInterface
{
    private $parser;
    private $result;

    public function setParser(ParserInterface $parser)
    {
        $this->parser = $parser;
    }

    private function getInfo($type)
    {
        if (null === $this->parser) {
            throw new \Exception('Parser must be set');
        }

        if (null === $this->result) {
            $this->result = $this->parser->parse($this->source);
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

    public function extract()
    {
        return array(
            ParserInterface::INFO_TYPE             => $this->getType(),
            ParserInterface::INFO_TITLE            => $this->getTitle(),
            ParserInterface::INFO_DESCRIPTION      => $this->getDescription(),
            ParserInterface::INFO_URL              => $this->getUrl(),
            ParserInterface::INFO_THUMBNAIL_URL    => $this->getThumbnailUrl(),
            ParserInterface::INFO_THUMBNAIL_WIDTH  => $this->getThumbnailWidth(),
            ParserInterface::INFO_THUMBNAIL_HEIGHT => $this->getThumbnailHeight(),
            ParserInterface::INFO_HTML             => $this->getHtml(),
            ParserInterface::INFO_WIDTH            => $this->getWidth(),
            ParserInterface::INFO_HEIGHT           => $this->getHeight(),
            ParserInterface::INFO_AUTHOR_NAME      => $this->getAuthorName(),
            ParserInterface::INFO_AUTHOR_URL       => $this->getAuthorUrl(),
            ParserInterface::INFO_PROVIDER_NAME    => $this->getProviderName(),
            ParserInterface::INFO_PROVIDER_URL     => $this->getProviderUrl(),
        );
    }
}