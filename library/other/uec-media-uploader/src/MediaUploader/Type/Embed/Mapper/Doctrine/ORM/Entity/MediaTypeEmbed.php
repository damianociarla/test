<?php

namespace UEC\MediaUploader\Type\Embed\Mapper\Doctrine\ORM\Entity;

use Doctrine\ORM\Mapping as ORM;
use UEC\MediaUploader\Type\Embed\Model\MediaTypeEmbed as BaseMediaTypeEmbed;

/**
 * @ORM\MappedSuperclass
 */
abstract class MediaTypeEmbed extends BaseMediaTypeEmbed
{
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $type;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $title;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $description;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $url;

    /**
     * @ORM\Column(type="string", name="thumbnail_url", nullable=true)
     */
    protected $thumbnailUrl;

    /**
     * @ORM\Column(type="integer", name="thumbnail_width", nullable=true)
     */
    protected $thumbnailWidth;

    /**
     * @ORM\Column(type="integer", name="thumbnail_height", nullable=true)
     */
    protected $thumbnailHeight;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $html;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $width;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $height;

    /**
     * @ORM\Column(type="string", name="author_name", nullable=true)
     */
    protected $authorName;

    /**
     * @ORM\Column(type="string", name="author_url", nullable=true)
     */
    protected $authorUrl;

    /**
     * @ORM\Column(type="string", name="provider_name", nullable=true)
     */
    protected $providerName;

    /**
     * @ORM\Column(type="string", name="provider_url", nullable=true)
     */
    protected $providerUrl;
}