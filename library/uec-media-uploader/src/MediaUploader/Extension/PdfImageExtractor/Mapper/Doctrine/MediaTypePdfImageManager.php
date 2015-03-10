<?php

namespace UEC\MediaUploader\Extension\PdfImageExtractor\Mapper\Doctrine;

use UEC\MediaUploader\Extension\PdfImageExtractor\Model\AbstractMediaTypePdfImageManager;
use UEC\MediaUploader\Extension\PdfImageExtractor\Model\MediaTypePdfImage;
use UEC\MediaUploader\Extension\PdfImageExtractor\Model\MediaTypePdfImageInterface;
use UEC\MediaUploader\Mapper\Doctrine\DoctrineObjectPersistence;
use UEC\MediaUploader\Mapper\Doctrine\DoctrineObjectRepository;

class MediaTypePdfImageManager extends AbstractMediaTypePdfImageManager
{
    protected $doctrineObjectPersistence;
    protected $doctrineObjectRepository;
    protected $className;

    function __construct(DoctrineObjectPersistence $doctrineObjectPersistence, DoctrineObjectRepository $doctrineObjectRepository, $className)
    {
        $this->doctrineObjectPersistence = $doctrineObjectPersistence;
        $this->doctrineObjectRepository = $doctrineObjectRepository;
        $this->className = $className;
    }

    public function getClassName()
    {
        return $this->className;
    }

    public function findAllByMedia($id)
    {
        return $this->doctrineObjectRepository->setClassName($this->className)->findBy(array(
            'media' => $id
        ));
    }

    public function findByMediaAndPage($id, $page)
    {
        return $this->doctrineObjectRepository->setClassName($this->className)->findOneBy(array(
            'mediaPdf' => $id,
            'pageNumber' => $page,
        ));
    }

    protected function getMediaObjectPersistence()
    {
        return $this->doctrineObjectPersistence;
    }

    public function isNewMediaTypePdfImage(MediaTypePdfImage $mediaTypePdfImage)
    {
        return !$this->doctrineObjectPersistence->isNew($mediaTypePdfImage);
    }
}