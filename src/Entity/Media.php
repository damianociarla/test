<?php

namespace Entity;

use UEC\MediaUploader\Core\Model\Media as BaseMedia;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="media")
 */
class Media extends BaseMedia
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(length=140)
     */
    protected $context;

    /**
     * @ORM\Column(length=255)
     */
    protected $path;
}