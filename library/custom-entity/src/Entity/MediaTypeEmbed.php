<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use UEC\MediaUploader\Type\Embed\Mapper\Doctrine\ORM\Entity\MediaTypeEmbed as BaseMediaTypeEmbed;

/**
 * @ORM\Entity
 * @ORM\Table(name="media_embed")
 */
class MediaTypeEmbed extends BaseMediaTypeEmbed
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Media")
     * @ORM\JoinColumn(name="media_id", referencedColumnName="id")
     */
    protected $media;
}