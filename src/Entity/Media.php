<?php

namespace Entity;

use UEC\MediaUploader\Mapper\Doctrine\ORM\Entity\Media as BaseMedia;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="media")
 */
class Media extends BaseMedia
{
}