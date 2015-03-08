<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use UEC\MediaUploader\Extension\PdfImageExtractor\Mapper\Doctrine\ORM\Entity\MediaTypePdfImage as BaseMediaTypePdfImage;

/**
 * @ORM\Entity
 * @ORM\Table(name="media_pdf_image")
 */
class MediaTypePdfImage extends BaseMediaTypePdfImage
{
    /**
     * @ORM\ManyToOne(targetEntity="MediaTypePdf")
     * @ORM\JoinColumn(name="media_pdf_id", referencedColumnName="media_id")
     */
    protected $mediaPdf;

    /**
     * @ORM\ManyToOne(targetEntity="Media")
     * @ORM\JoinColumn(name="media_id", referencedColumnName="id")
     */
    protected $media;
}