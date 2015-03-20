<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use UEC\MediaUploader\Type\Pdf\Mapper\Doctrine\ORM\Entity\MediaTypePdf as BaseMediaTypePdf;

/**
 * @ORM\Entity
 * @ORM\Table(name="media_pdf")
 */
class MediaTypePdf extends BaseMediaTypePdf
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Media")
     * @ORM\JoinColumn(name="media_id", referencedColumnName="id")
     */
    protected $media;
}