<?php

namespace UEC\MediaUploader\Core;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;
use UEC\MediaUploader\Core\ContextLocator\ContextLocatorInterface;
use UEC\MediaUploader\Core\Event\EventDispatcherInterface;
use UEC\MediaUploader\Core\Event\MediaEvents;
use UEC\MediaUploader\Core\Exception\UnexpectedAdapterException;
use UEC\MediaUploader\Core\Model\MediaManagerInterface as ModelMediaManagerInterface;

class MediaUploader implements MediaUploaderInterface
{
    protected $modelMediaManager;
    protected $contextLocator;
    protected $eventDispatcher;

    function __construct(ModelMediaManagerInterface $modelMediaManager, ContextLocatorInterface $contextLocator, EventDispatcherInterface $eventDispatcher)
    {
        $this->modelMediaManager = $modelMediaManager;
        $this->contextLocator = $contextLocator;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function save(AdapterInterface $adapter, $context)
    {
        $contextLocator = $this->contextLocator->get($context);

        if (!$contextLocator->supports($adapter)) {
            throw new UnexpectedAdapterException($adapter, $contextLocator->getSupportedAdapters());
        }

        $defaultValidators = $contextLocator->getDefaultValidators();

        foreach ($defaultValidators as $validator) {
            $adapter->addValidator($validator, true);
        }

        if (!$adapter->isValid()) {
            return null;
        }

        $this->eventDispatcher->dispatch(MediaEvents::AFTER_VALIDATION_ADAPTER, $context, $adapter);

        $analyzer = $contextLocator->getAnalyzer();
        $analyzer->analyze($adapter);

        $this->eventDispatcher->dispatch(MediaEvents::AFTER_ANALYZE_ADAPTER, $context, $adapter, $analyzer);

        $filePath = $contextLocator->getAdapterManager()->save($adapter, $context);

        $this->eventDispatcher->dispatch(MediaEvents::AFTER_UPLOAD_MEDIA, $context, $adapter, $analyzer);

        $media = $this->modelMediaManager->create($context);
        $media->setPath($filePath);

        $modelMediaTypeManager = $contextLocator->getMediaTypeManager();
        $mediaType = $modelMediaTypeManager->create($media);

        $this->eventDispatcher->dispatch(MediaEvents::BEFORE_INITIALIZE_MEDIA_TYPE, $context, $mediaType, $analyzer);

        $contextLocator->getMediaInitializer()->initializeMedia($media, $analyzer);
        $contextLocator->getMediaInitializer()->initializeMediaType($mediaType, $analyzer);

        $this->eventDispatcher->dispatch(MediaEvents::BEFORE_SAVE_MEDIA, $context, $media, $mediaType, $analyzer);

        $this->modelMediaManager->save($media);
        $modelMediaTypeManager->save($mediaType);

        $this->eventDispatcher->dispatch(MediaEvents::AFTER_SAVE_MEDIA, $context, $media, $analyzer);

        return $media;
    }

    public function getContextLocator($context)
    {
        return $this->contextLocator->get($context);
    }
}