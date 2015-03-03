<?php

namespace UEC\MediaUploader\Core;

use UEC\MediaUploader\Core\Factory\MediaManagerServicesFactoryInterface;
use UEC\MediaUploader\Core\Model\MediaManagerInterface as ModelMediaManagerInterface;
use UEC\MediaUploader\Core\Uploader\CommonFileInterface;
use UEC\MediaUploader\Core\Uploader\UploadAdapterInterface;

class MediaManager implements MediaManagerInterface
{
    protected $modelMediaManager;
    protected $mediaManagerServicesFactory;

    function __construct(ModelMediaManagerInterface $modelMediaManager, MediaManagerServicesFactoryInterface $mediaManagerServicesFactory)
    {
        $this->modelMediaManager = $modelMediaManager;
        $this->mediaManagerServicesFactory = $mediaManagerServicesFactory;
    }

    public function save($context, UploadAdapterInterface $adapter)
    {
        if (!$adapter->isValid()) {
            return null;
        }

        $mediaManagerServices = $this->mediaManagerServicesFactory->get($context);

        $analyzer = $mediaManagerServices->getAnalyzer();
        $analyzer->analyze($adapter);

        $filePath = $mediaManagerServices->getUploader()
            ->setCdn($mediaManagerServices->getCDN())
            ->setFilenameGenerator($mediaManagerServices->getFilenameGenerator())
            ->setPathGenerator($mediaManagerServices->getPathGenerator())
            ->upload($context, $adapter, $analyzer);

        $media = $this->modelMediaManager->create($context);
        $media->setPath($filePath);

        $modelMediaTypeManager = $mediaManagerServices->getMediaTypeManager();

        $mediaType = $modelMediaTypeManager->create($media);
        $mediaManagerServices->getInitializer()->initializeMediaType($mediaType, $analyzer);

        $this->modelMediaManager->save($media);
        $modelMediaTypeManager->save($mediaType);

        return $media;
    }
}