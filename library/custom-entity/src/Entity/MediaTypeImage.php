<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use UEC\MediaUploader\Type\Image\Mapper\Doctrine\ORM\Entity\MediaTypeImage as BaseMediaTypeImage;

/**
 * @ORM\Entity
 * @ORM\Table(name="media_image")
 */
class MediaTypeImage extends BaseMediaTypeImage
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Media")
     * @ORM\JoinColumn(name="media_id", referencedColumnName="id")
     */
    protected $media;
}