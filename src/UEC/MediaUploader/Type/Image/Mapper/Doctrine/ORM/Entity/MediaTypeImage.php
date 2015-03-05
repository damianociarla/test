<?php

namespace UEC\MediaUploader\Type\Image\Mapper\Doctrine\ORM\Entity;

use Doctrine\ORM\Mapping as ORM;
use UEC\MediaUploader\Type\Image\Model\MediaTypeImage as BaseMediaTypeImage;

/**
 * @ORM\MappedSuperclass
 */
abstract class MediaTypeImage extends BaseMediaTypeImage
{
    /**
     * @ORM\Column(type="integer")
     */
    protected $width;

    /**
     * @ORM\Column(type="integer")
     */
    protected $height;

    /**
     * @ORM\Column(type="integer")
     */
    protected $size;
}