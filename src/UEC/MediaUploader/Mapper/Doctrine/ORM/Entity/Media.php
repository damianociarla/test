<?php

namespace UEC\MediaUploader\Mapper\Doctrine\ORM\Entity;

use UEC\MediaUploader\Core\Model\Media as BaseMedia;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Media extends BaseMedia
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(length=32)
     */
    protected $context;

    /**
     * @ORM\Column(length=255)
     */
    protected $path;
}