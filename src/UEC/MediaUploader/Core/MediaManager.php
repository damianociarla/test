<?php

namespace UEC\MediaUploader\Core;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;
use UEC\MediaUploader\Core\Event\EventDispatcherInterface;
use UEC\MediaUploader\Core\Event\MediaEvents;
use UEC\MediaUploader\Core\Exception\UnexpectedAdapterException;
use UEC\MediaUploader\Core\Factory\ContextConfigurationFactoryInterface;
use UEC\MediaUploader\Core\Model\MediaManagerInterface as ModelMediaManagerInterface;

class MediaManager implements MediaManagerInterface
{
    protected $modelMediaManager;
    protected $contextConfigurationFactory;
    protected $eventDispatcher;

    function __construct(ModelMediaManagerInterface $modelMediaManager, ContextConfigurationFactoryInterface $contextConfigurationFactory, EventDispatcherInterface $eventDispatcher)
    {
        $this->modelMediaManager = $modelMediaManager;
        $this->contextConfigurationFactory = $contextConfigurationFactory;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function save($context, AdapterInterface $adapter)
    {
        $contextConfiguration = $this->contextConfigurationFactory->get($context);

        if (!$contextConfiguration->supports($adapter)) {
            throw new UnexpectedAdapterException($adapter, $contextConfiguration->getSupportedAdapters());
        }

        $defaultValidators = $contextConfiguration->getDefaultValidators();

        foreach ($defaultValidators as $validator) {
            $adapter->addValidator($validator, true);
        }

        if (!$adapter->isValid()) {
            return null;
        }

        $this->eventDispatcher->dispatch(MediaEvents::AFTER_VALIDATION_ADAPTER, $context, $adapter);

        $analyzer = $contextConfiguration->getAnalyzer();
        $analyzer->analyze($adapter);

        $this->eventDispatcher->dispatch(MediaEvents::AFTER_ANALYZE_ADAPTER, $context, $adapter, $analyzer);

        $filePath = $contextConfiguration->getMediaService()->save($context, $adapter, $analyzer);

        $this->eventDispatcher->dispatch(MediaEvents::AFTER_UPLOAD_MEDIA, $context, $adapter, $analyzer);

        $media = $this->modelMediaManager->create($context);
        $media->setPath($filePath);

        $modelMediaTypeManager = $contextConfiguration->getMediaTypeManager();
        $mediaType = $modelMediaTypeManager->create($media);

        $this->eventDispatcher->dispatch(MediaEvents::BEFORE_INITIALIZE_MEDIA_TYPE, $context, $mediaType, $analyzer);

        $contextConfiguration->getInitializer()->initializeMediaType($mediaType, $analyzer);

        $this->eventDispatcher->dispatch(MediaEvents::BEFORE_SAVE_MEDIA, $context, $media, $mediaType, $analyzer);

        $this->modelMediaManager->save($media);
        $modelMediaTypeManager->save($mediaType);

        $this->eventDispatcher->dispatch(MediaEvents::AFTER_SAVE_MEDIA, $context, $media, $mediaType, $analyzer);

        return $media;
    }
}