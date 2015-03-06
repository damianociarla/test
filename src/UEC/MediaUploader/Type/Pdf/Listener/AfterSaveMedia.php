<?php

namespace UEC\MediaUploader\Type\Pdf\Listener;

use UEC\MediaUploader\Core\Adapter\Common\LocalFile;
use UEC\MediaUploader\Core\MediaManagerInterface;
use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfInterface;
use UEC\MediaUploader\Type\Pdf\Parser\PdfParserInterface;

class AfterSaveMedia
{
    protected $mediaManager;
    protected $pdfParser;
    protected $quality;
    protected $contextImageName;

    function __construct(MediaManagerInterface $mediaManager, PdfParserInterface $pdfParser, $quality, $contextImageName)
    {
        $this->mediaManager = $mediaManager;
        $this->pdfParser = $pdfParser;
        $this->quality = $quality;
        $this->contextImageName = $contextImageName;
    }

    public function extractImageFromPdf(MediaInterface $media)
    {
        $mediaType = $media->getMediaType();

        if ($mediaType instanceof MediaTypePdfInterface) {
            $configuration = $this->mediaManager->getContextConfiguration($media);
            $deliveryPath = $configuration->getCDN()->getDeliveryPath($media);

            $mediaBaseDir = pathinfo($media->getPath(), PATHINFO_DIRNAME).'/'.pathinfo($media->getPath(), PATHINFO_FILENAME);

            for ($pageNumber = 0; $pageNumber < $mediaType->getTotalPageNumber(); $pageNumber++) {
                $filename = sprintf('page_%s.jpg', $pageNumber);
                $finalPath = $mediaBaseDir.'/'.$filename;

                if ($this->pdfParser->extractPageFromPdf($deliveryPath, $pageNumber, $this->quality, $finalPath)) {
                    $adapter = new LocalFile($finalPath, true);
                    $media = $this->mediaManager->save($this->contextImageName, $adapter);
                }
            }
        }
    }
}