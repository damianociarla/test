<?php

namespace UEC\Media\Provider\Embed\Destination;

use Doctrine\ORM\Mapping as ORM;
use UEC\Media\Provider\Embed\Model\MediaEmbed;

/**
 * @ORM\Entity
 * @ORM\Table(name="media")
 */
class EmbedEntity
{
    /**
     * @ORM\Column(name="title")
     */
    protected $title;

    /**
     * @ORM\Column(name="provider_class")
     */
    protected $providerClass;

    /**
     * Get providerClass
     *
     * @return mixed
     */
    public function getProviderClass()
    {
        return $this->providerClass;
    }

    /**
     * Set providerClass
     *
     * @param mixed $providerClass
     * @return EmbedEntity
     */
    public function setProviderClass($providerClass)
    {
        $this->providerClass = $providerClass;
        return $this;
    }

    /**
     * Get title
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param mixed $title
     * @return EmbedEntity
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
}