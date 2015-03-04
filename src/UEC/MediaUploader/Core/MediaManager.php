<?php

namespace UEC\MediaUploader\Core;

use UEC\MediaUploader\Core\Event\AdapterEvent;
use UEC\MediaUploader\Core\Event\AnalyzerEvent;
use UEC\MediaUploader\Core\Event\EventDispatcherInterface;
use UEC\MediaUploader\Core\Event\MediaEvents;
use UEC\MediaUploader\Core\Factory\MediaManagerServicesFactoryInterface;
use UEC\MediaUploader\Core\Model\MediaManagerInterface as ModelMediaManagerInterface;
use UEC\MediaUploader\Core\Uploader\CommonFileInterface;
use UEC\MediaUploader\Core\Uploader\UploadAdapterInterface;

class MediaManager implements MediaManagerInterface
{
    protected $modelMediaManager;
    protected $mediaManagerServicesFactory;
    protected $eventDispatcher;

    function __construct(ModelMediaManagerInterface $modelMediaManager, MediaManagerServicesFactoryInterface $mediaManagerServicesFactory, EventDispatcherInterface $eventDispatcher)
    {
        $this->modelMediaManager = $modelMediaManager;
        $this->mediaManagerServicesFactory = $mediaManagerServicesFactory;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function save($context, UploadAdapterInterface $adapter)
    {
        $mediaManagerServices = $this->mediaManagerServicesFactory->get($context);

        $defaultValidators = $mediaManagerServices->getDefaultValidators();

        foreach ($defaultValidators as $validator) {
            $adapter->addValidator($validator, true);
        }

        if (!$adapter->isValid()) {
            return null;
        }

        $this->eventDispatcher->dispatch(MediaEvents::AFTER_VALIDATION_ADAPTER, $context, $adapter);

        $analyzer = $mediaManagerServices->getAnalyzer();
        $analyzer->analyze($adapter);

        $this->eventDispatcher->dispatch(MediaEvents::AFTER_ANALYZE_ADAPTER, $context, $adapter, $analyzer);

        $filePath = $mediaManagerServices->getUploader()->save($context, $adapter, $analyzer);

        $this->eventDispatcher->dispatch(MediaEvents::AFTER_UPLOAD_MEDIA, $context, $adapter, $analyzer);

        $media = $this->modelMediaManager->create($context);
        $media->setPath($filePath);

        $modelMediaTypeManager = $mediaManagerServices->getMediaTypeManager();
        $mediaType = $modelMediaTypeManager->create($media);

        $this->eventDispatcher->dispatch(MediaEvents::BEFORE_INITIALIZE_MEDIA_TYPE, $context, $mediaType, $analyzer);

        $mediaManagerServices->getInitializer()->initializeMediaType($mediaType, $analyzer);

        $this->eventDispatcher->dispatch(MediaEvents::BEFORE_SAVE_MEDIA, $context, $media, $mediaType, $analyzer);

        $this->modelMediaManager->save($media);
        $modelMediaTypeManager->save($mediaType);

        $this->eventDispatcher->dispatch(MediaEvents::AFTER_SAVE_MEDIA, $context, $media, $mediaType, $analyzer);

        return $media;
    }
}