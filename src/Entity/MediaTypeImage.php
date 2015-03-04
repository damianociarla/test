<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use UEC\MediaUploader\Type\Image\Model\MediaTypeImage as BaseMediaTypeImage;

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