<?php

namespace UEC\MediaUploader\Type\Pdf\Listener;

use UEC\MediaUploader\Core\Adapter\Common\LocalFile;
use UEC\MediaUploader\Core\MediaManagerInterface;
use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Extension\PdfImageExtractor\Extractor\ExtractorInterface;
use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfInterface;

class AfterSaveMedia
{
    protected $mediaManager;
    protected $extractor;
    protected $quality;
    protected $contextImageName;

    function __construct(MediaManagerInterface $mediaManager, ExtractorInterface $extractor, $quality, $contextImageName)
    {
        $this->mediaManager = $mediaManager;
        $this->extractor = $extractor;
        $this->quality = $quality;
        $this->contextImageName = $contextImageName;
    }

    public function extractImageFromPdf(MediaInterface $media)
    {
        $mediaType = $media->getMediaType();

        if ($mediaType instanceof MediaTypePdfInterface) {
            $configuration = $this->mediaManager->getContextLocator($media);
            $deliveryPath = $configuration->getCDN()->getDeliveryPath($media);

            $mediaBaseDir = pathinfo($media->getPath(), PATHINFO_DIRNAME).'/'.pathinfo($media->getPath(), PATHINFO_FILENAME);

            for ($pageNumber = 0; $pageNumber < $mediaType->getTotalPageNumber(); $pageNumber++) {
                $filename = sprintf('page_%s.jpg', $pageNumber);
                $finalPath = $mediaBaseDir.'/'.$filename;

                if ($this->extractor->extractPageFromPdf($deliveryPath, $pageNumber, $this->quality, $finalPath)) {
                    $adapter = new LocalFile($finalPath, true);
                    $media = $this->mediaManager->save($adapter, $this->contextImageName);
                }
            }
        }
    }
}