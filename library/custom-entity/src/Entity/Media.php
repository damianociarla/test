<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use UEC\MediaUploader\Mapper\Doctrine\ORM\Entity\Media as BaseMedia;

/**
 * @ORM\Entity
 * @ORM\Table(name="media")
 */
class Media extends BaseMedia
{
}