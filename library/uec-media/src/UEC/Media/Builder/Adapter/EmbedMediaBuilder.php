<?php

namespace UEC\Media\Builder\Adapter;

use UEC\Media\Adapter\AdapterInterface;
use UEC\Media\Adapter\EmbedAdapterInterface;
use UEC\Media\Builder\MediaBuilderAdapterInterface;
use UEC\Media\Builder\MediaBuilderInterface;

class EmbedMediaBuilder implements MediaBuilderAdapterInterface
{
    public function supports(AdapterInterface $adapter)
    {
        return $adapter instanceof EmbedAdapterInterface;
    }

    public function build(MediaBuilderInterface $mediaBuilder, AdapterInterface $adapter)
    {
        $mediaBuilder
            ->add('type', $adapter->getType())
            ->add('title', $adapter->getTitle())
            ->add('description', $adapter->getDescription())
            ->add('url', $adapter->getUrl())
            ->add('thumbnailUrl', $adapter->getThumbnailUrl())
            ->add('thumbnailWidth', $adapter->getThumbnailWidth())
            ->add('thumbnailHeight', $adapter->getThumbnailHeight())
            ->add('html', $adapter->getHtml())
            ->add('width', $adapter->getWidth())
            ->add('height', $adapter->getHeight())
            ->add('authorName', $adapter->getAuthorName())
            ->add('authorUrl', $adapter->getAuthorUrl())
            ->add('providerName', $adapter->getProviderName())
            ->add('providerUrl', $adapter->getProviderUrl())
        ;
    }

    public function getClassName()
    {
        return 'UEC\Media\Model\MediaEmbed';
    }
}