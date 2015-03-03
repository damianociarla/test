<?php

namespace UEC\MediaUploader\Image\Mapper\Doctrine\ORM\Entity;

use Doctrine\ORM\Mapping as ORM;
use UEC\MediaUploader\Image\Model\MediaTypeImage;

/**
 * @ORM\MappedSuperclass
 */
abstract class MediaImage extends MediaTypeImage
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