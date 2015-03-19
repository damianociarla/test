<?php

namespace UEC\Media\Provider\Embed\Builder;

use UEC\Media\Adapter\AdapterInterface;
use UEC\Media\Builder\MediaBuilderInterface;
use UEC\Media\Builder\ParamBagInterface;
use UEC\Media\Provider\Embed\Adapter\EmbedAdapterInterface;
use UEC\Media\Provider\Embed\Parser\ParserInterface;

class EmbedMediaBuilder implements MediaBuilderInterface
{
    public function supports(AdapterInterface $adapter)
    {
        return $adapter instanceof EmbedAdapterInterface;
    }

    public function build(ParamBagInterface $paramBag, AdapterInterface $adapter)
    {
        $paramBag
            ->add(ParserInterface::INFO_TYPE, $adapter->getType())
            ->add(ParserInterface::INFO_TITLE, $adapter->getTitle())
            ->add(ParserInterface::INFO_DESCRIPTION, $adapter->getDescription())
            ->add(ParserInterface::INFO_URL, $adapter->getUrl())
            ->add(ParserInterface::INFO_THUMBNAIL_URL, $adapter->getThumbnailUrl())
            ->add(ParserInterface::INFO_THUMBNAIL_WIDTH, $adapter->getThumbnailWidth())
            ->add(ParserInterface::INFO_THUMBNAIL_HEIGHT, $adapter->getThumbnailHeight())
            ->add(ParserInterface::INFO_HTML, $adapter->getHtml())
            ->add(ParserInterface::INFO_WIDTH, $adapter->getWidth())
            ->add(ParserInterface::INFO_HEIGHT, $adapter->getHeight())
            ->add(ParserInterface::INFO_AUTHOR_NAME, $adapter->getAuthorName())
            ->add(ParserInterface::INFO_AUTHOR_URL, $adapter->getAuthorUrl())
            ->add(ParserInterface::INFO_PROVIDER_NAME, $adapter->getProviderName())
            ->add(ParserInterface::INFO_PROVIDER_URL, $adapter->getProviderUrl())
        ;
    }

    public function getClassName()
    {
        return 'UEC\Media\Provider\Embed\Model\MediaEmbed';
    }
}