<?php

namespace UEC\MediaUploader\Type\Embed\Model;

interface MediaTypeEmbedInterface
{
    /**
     * Get authorName
     *
     * @return string
     */
    public function getAuthorName();

    /**
     * Set authorName
     *
     * @param string $authorName
     * @return MediaTypeEmbedInterface
     */
    public function setAuthorName($authorName = null);

    /**
     * Get authorUrl
     *
     * @return string
     */
    public function getAuthorUrl();

    /**
     * Set authorUrl
     *
     * @param string $authorUrl
     * @return MediaTypeEmbedInterface
     */
    public function setAuthorUrl($authorUrl = null);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set description
     *
     * @param string $description
     * @return MediaTypeEmbedInterface
     */
    public function setDescription($description = null);

    /**
     * Get height
     *
     * @return string
     */
    public function getHeight();

    /**
     * Set height
     *
     * @param string $height
     * @return MediaTypeEmbedInterface
     */
    public function setHeight($height = null);

    /**
     * Get html
     *
     * @return string
     */
    public function getHtml();

    /**
     * Set html
     *
     * @param string $html
     * @return MediaTypeEmbedInterface
     */
    public function setHtml($html = null);

    /**
     * Get providerName
     *
     * @return string
     */
    public function getProviderName();

    /**
     * Set providerName
     *
     * @param string $providerName
     * @return MediaTypeEmbedInterface
     */
    public function setProviderName($providerName = null);

    /**
     * Get providerUrl
     *
     * @return string
     */
    public function getProviderUrl();

    /**
     * Set providerUrl
     *
     * @param string $providerUrl
     * @return MediaTypeEmbedInterface
     */
    public function setProviderUrl($providerUrl = null);

    /**
     * Get thumbnailHeight
     *
     * @return string
     */
    public function getThumbnailHeight();

    /**
     * Set thumbnailHeight
     *
     * @param string $thumbnailHeight
     * @return MediaTypeEmbedInterface
     */
    public function setThumbnailHeight($thumbnailHeight = null);

    /**
     * Get thumbnailUrl
     *
     * @return string
     */
    public function getThumbnailUrl();

    /**
     * Set thumbnailUrl
     *
     * @param string $thumbnailUrl
     * @return MediaTypeEmbedInterface
     */
    public function setThumbnailUrl($thumbnailUrl = null);

    /**
     * Get thumbnailWidth
     *
     * @return string
     */
    public function getThumbnailWidth();

    /**
     * Set thumbnailWidth
     *
     * @param string $thumbnailWidth
     * @return MediaTypeEmbedInterface
     */
    public function setThumbnailWidth($thumbnailWidth = null);

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set title
     *
     * @param string $title
     * @return MediaTypeEmbedInterface
     */
    public function setTitle($title = null);

    /**
     * Get type
     *
     * @return string
     */
    public function getType();

    /**
     * Set type
     *
     * @param string $type
     * @return MediaTypeEmbedInterface
     */
    public function setType($type = null);

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl();

    /**
     * Set url
     *
     * @param string $url
     * @return MediaTypeEmbedInterface
     */
    public function setUrl($url = null);

    /**
     * Get width
     *
     * @return string
     */
    public function getWidth();

    /**
     * Set width
     *
     * @param string $width
     * @return MediaTypeEmbedInterface
     */
    public function setWidth($width = null);
}