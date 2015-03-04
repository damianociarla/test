<?php

namespace UEC\MediaUploader\Mapper\Doctrine\ORM\Entity;

use Doctrine\ORM\Mapping as ORM;
use UEC\MediaUploader\Core\Model\Media as BaseMedia;

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