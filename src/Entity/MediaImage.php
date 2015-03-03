<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use UEC\MediaUploader\Type\Image\Mapper\Doctrine\ORM\Entity\MediaImage as BaseMediaImage;

/**
 * @ORM\Entity
 * @ORM\Table(name="media_image")
 */
class MediaImage extends BaseMediaImage
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Media")
     * @ORM\JoinColumn(name="media_id", referencedColumnName="id")
     */
    protected $media;
}