<?php

namespace UEC\Media\Provider\Embed\Model;

use UEC\Media\Model\Media;

class MediaEmbed extends Media implements MediaEmbedInterface
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $thumbnailUrl;

    /**
     * @var string
     */
    protected $thumbnailWidth;

    /**
     * @var string
     */
    protected $thumbnailHeight;

    /**
     * @var string
     */
    protected $html;

    /**
     * @var string
     */
    protected $width;

    /**
     * @var string
     */
    protected $height;

    /**
     * @var string
     */
    protected $authorName;

    /**
     * @var string
     */
    protected $authorUrl;

    /**
     * @var string
     */
    protected $providerName;

    /**
     * @var string
     */
    protected $providerUrl;

    public function getAuthorName()
    {
        return $this->authorName;
    }

    public function setAuthorName($authorName = null)
    {
        $this->authorName = $authorName;
        return $this;
    }

    public function getAuthorUrl()
    {
        return $this->authorUrl;
    }

    public function setAuthorUrl($authorUrl = null)
    {
        $this->authorUrl = $authorUrl;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description = null)
    {
        $this->description = $description;
        return $this;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height = null)
    {
        $this->height = $height;
        return $this;
    }

    public function getHtml()
    {
        return $this->html;
    }

    public function setHtml($html = null)
    {
        $this->html = $html;
        return $this;
    }

    public function getProviderName()
    {
        return $this->providerName;
    }

    public function setProviderName($providerName = null)
    {
        $this->providerName = $providerName;
        return $this;
    }

    public function getProviderUrl()
    {
        return $this->providerUrl;
    }

    public function setProviderUrl($providerUrl = null)
    {
        $this->providerUrl = $providerUrl;
        return $this;
    }

    public function getThumbnailHeight()
    {
        return $this->thumbnailHeight;
    }

    public function setThumbnailHeight($thumbnailHeight = null)
    {
        $this->thumbnailHeight = $thumbnailHeight;
        return $this;
    }

    public function getThumbnailUrl()
    {
        return $this->thumbnailUrl;
    }

    public function setThumbnailUrl($thumbnailUrl = null)
    {
        $this->thumbnailUrl = $thumbnailUrl;
        return $this;
    }

    public function getThumbnailWidth()
    {
        return $this->thumbnailWidth;
    }

    public function setThumbnailWidth($thumbnailWidth = null)
    {
        $this->thumbnailWidth = $thumbnailWidth;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title = null)
    {
        $this->title = $title;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type = null)
    {
        $this->type = $type;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url = null)
    {
        $this->url = $url;
        return $this;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width = null)
    {
        $this->width = $width;
        return $this;
    }
}