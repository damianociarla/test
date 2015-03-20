<?php

namespace UEC\Media\Provider\Embed\Builder;

use UEC\Media\Adapter\AdapterInterface;
use UEC\Media\Builder\MediaBuilderInterface;
use UEC\Media\Builder\ParamBagInterface;
use UEC\Media\Provider\Embed\Adapter\EmbedAdapterInterface;
use UEC\Media\Provider\Embed\Parser\ParserInterface;
use UEC\Media\Reader\ReaderInterface;

class EmbedMediaBuilder implements MediaBuilderInterface
{
    public function supports(AdapterInterface $adapter)
    {
        return $adapter instanceof EmbedAdapterInterface;
    }

    public function build(ParamBagInterface $paramBag, ReaderInterface $reader)
    {
        $result = $reader->extract();

        $paramBag
            ->add('type', $result[ParserInterface::INFO_TYPE])
            ->add('title', $result[ParserInterface::INFO_TITLE])
            ->add('description', $result[ParserInterface::INFO_DESCRIPTION])
            ->add('url', $result[ParserInterface::INFO_URL])
            ->add('thumbnailUrl', $result[ParserInterface::INFO_THUMBNAIL_URL])
            ->add('thumbnailWidth', $result[ParserInterface::INFO_THUMBNAIL_WIDTH])
            ->add('thumbnailHeight', $result[ParserInterface::INFO_THUMBNAIL_HEIGHT])
            ->add('html', $result[ParserInterface::INFO_HTML])
            ->add('width', $result[ParserInterface::INFO_WIDTH])
            ->add('height', $result[ParserInterface::INFO_HEIGHT])
            ->add('authorName', $result[ParserInterface::INFO_AUTHOR_NAME])
            ->add('authorUrl', $result[ParserInterface::INFO_AUTHOR_URL])
            ->add('providerName', $result[ParserInterface::INFO_PROVIDER_NAME])
            ->add('providerUrl', $result[ParserInterface::INFO_PROVIDER_URL])
        ;
    }

    public function getClassName()
    {
        return 'UEC\Media\Provider\Embed\Model\MediaEmbed';
    }
}