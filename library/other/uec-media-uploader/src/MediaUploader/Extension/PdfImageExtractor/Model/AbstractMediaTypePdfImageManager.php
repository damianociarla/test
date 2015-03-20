<?php

namespace UEC\MediaUploader\Extension\PdfImageExtractor\Model;

use UEC\MediaUploader\Core\Persistence\MediaObjectPersistenceInterface;

abstract class AbstractMediaTypePdfImageManager implements MediaTypePdfImageManagerInterface
{
    public function save(MediaTypePdfImage $mediaTypePdfImage)
    {
        $this->getMediaObjectPersistence()->persist($mediaTypePdfImage);
    }

    public function remove(MediaTypePdfImage $mediaTypePdfImage)
    {
        $this->getMediaObjectPersistence()->remove($mediaTypePdfImage);
    }

    public function create()
    {
        $className = $this->getClassName();
        return new $className();
    }

    /**
     * Get the object persistence
     *
     * @return MediaObjectPersistenceInterface
     */
    protected abstract function getMediaObjectPersistence();
}