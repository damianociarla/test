<?php

namespace UEC\Media\Provider\Embed\Builder;

use UEC\Media\Adapter\AdapterInterface;
use UEC\Media\Builder\MediaBuilderInterface;
use UEC\Media\Builder\ParamBagInterface;
use UEC\Media\Provider\Embed\Adapter\EmbedAdapterInterface;

class EmbedMediaBuilder implements MediaBuilderInterface
{
    public function supports(AdapterInterface $adapter)
    {
        return $adapter instanceof EmbedAdapterInterface;
    }

    public function build(ParamBagInterface $paramBag, AdapterInterface $adapter)
    {
        $paramBag
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
        return 'UEC\Media\Provider\Embed\Model\MediaEmbed';
    }
}