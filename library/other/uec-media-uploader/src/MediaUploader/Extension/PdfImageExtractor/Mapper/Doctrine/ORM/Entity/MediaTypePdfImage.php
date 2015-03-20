<?php

namespace UEC\MediaUploader\Extension\PdfImageExtractor\Mapper\Doctrine\ORM\Entity;

use Doctrine\ORM\Mapping as ORM;
use UEC\MediaUploader\Extension\PdfImageExtractor\Model\MediaTypePdfImage as BaseMediaTypePdfImage;

/**
 * @ORM\MappedSuperclass
 */
abstract class MediaTypePdfImage extends BaseMediaTypePdfImage
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", name="page_number", nullable=false)
     */
    protected $pageNumber;
}