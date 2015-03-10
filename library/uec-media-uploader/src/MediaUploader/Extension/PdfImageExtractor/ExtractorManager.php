<?php

namespace UEC\MediaUploader\Extension\PdfImageExtractor;

use UEC\MediaUploader\Core\Adapter\Common\BlobFile;
use UEC\MediaUploader\Core\MediaUploaderInterface;
use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Extension\PdfImageExtractor\Extractor\ExtractorInterface;
use UEC\MediaUploader\Extension\PdfImageExtractor\Model\MediaTypePdfImageManagerInterface;
use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfImageInterface;
use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfInterface;

class ExtractorManager implements ExtractorManagerInterface
{
    protected $mediaUploader;
    protected $mediaTypePdfImageManager;
    protected $extractor;
    protected $quality;
    protected $contextImageName;

    function __construct(MediaUploaderInterface $mediaUploader, MediaTypePdfImageManagerInterface $mediaTypePdfImageManager, ExtractorInterface $extractor, $contextImageName)
    {
        $this->mediaUploader = $mediaUploader;
        $this->mediaTypePdfImageManager = $mediaTypePdfImageManager;
        $this->extractor = $extractor;
        $this->quality = 200;
        $this->contextImageName = $contextImageName;
    }

    public function setQuality($quality)
    {
        $this->quality = $quality;
        return $this;
    }

    public function extractAll(MediaInterface $media)
    {
        $mediaTypePdf = $media->getMediaType();

        if (!$mediaTypePdf instanceof MediaTypePdfInterface) {
            throw new \UnexpectedValueException('Media must have a MediaTypePdfInterface');
        }

        $pdfImages = array();

        for ($pageNumber = 1; $pageNumber <= $mediaTypePdf->getTotalPageNumber(); $pageNumber++) {
            $pdfImages[$pageNumber] = $this->extractPage($media, $mediaTypePdf, $pageNumber);
        }

        return $pdfImages;
    }

    public function extractOne(MediaInterface $media, $pageNumber)
    {
        $mediaTypePdf = $media->getMediaType();

        if (!$mediaTypePdf instanceof MediaTypePdfInterface) {
            throw new \UnexpectedValueException('Media must have a MediaTypePdfInterface');
        }

        if (null !== $pageNumber && !is_int($pageNumber)) {
            throw new \UnexpectedValueException('The value must be int');
        }

        if ($pageNumber < $mediaTypePdf->getTotalPageNumber() || $pageNumber > $mediaTypePdf->getTotalPageNumber()) {
            throw new \UnexpectedValueException(sprintf('The value must be between 1 and %d', $mediaTypePdf->getTotalPageNumber()));
        }

        return $this->extractPage($media, $mediaTypePdf, $pageNumber);
    }

    /**
     * Logic for extract single image from pdf
     *
     * @param MediaInterface $media
     * @param MediaTypePdfInterface $mediaTypePdf
     * @param int $pageNumber
     * @return null|MediaTypePdfImageInterface
     */
    protected function extractPage(MediaInterface $media, MediaTypePdfInterface $mediaTypePdf, $pageNumber)
    {
        if (null !== $pdfImage = $this->mediaTypePdfImageManager->findByMediaAndPage($mediaTypePdf, $pageNumber)) {
            return $pdfImage;
        }

        $configuration = $this->mediaUploader->getContextLocator($media->getContext());
        $deliveryPath = $configuration->getCDN()->getDeliveryPath($media);

        if ($blobImage = $this->extractor->extractPageFromPdf($deliveryPath, $pageNumber - 1, $this->quality)) {
            $mediaBaseDir = pathinfo($deliveryPath, PATHINFO_DIRNAME).'/'.pathinfo($deliveryPath, PATHINFO_FILENAME);
            $finalPath = $mediaBaseDir.'/'.sprintf('page_%s.jpg', $pageNumber);

            $adapter = new BlobFile($blobImage);
            $adapter->setPath($finalPath);

            $media = $this->mediaUploader->save($adapter, $this->contextImageName);

            $pdfImage = $this->mediaTypePdfImageManager->create();
            $pdfImage->setMediaPdf($mediaTypePdf);
            $pdfImage->setPageNumber($pageNumber);
            $pdfImage->setMedia($media);

            $this->mediaTypePdfImageManager->save($pdfImage);

            return $pdfImage;
        }

        return null;
    }
}