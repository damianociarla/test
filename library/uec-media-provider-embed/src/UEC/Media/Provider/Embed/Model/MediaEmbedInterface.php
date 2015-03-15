<?php

namespace UEC\Media\Model;

interface MediaEmbedInterface
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
     * @return MediaEmbedInterface
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
     * @return MediaEmbedInterface
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
     * @return MediaEmbedInterface
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
     * @return MediaEmbedInterface
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
     * @return MediaEmbedInterface
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
     * @return MediaEmbedInterface
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
     * @return MediaEmbedInterface
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
     * @return MediaEmbedInterface
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
     * @return MediaEmbedInterface
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
     * @return MediaEmbedInterface
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
     * @return MediaEmbedInterface
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
     * @return MediaEmbedInterface
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
     * @return MediaEmbedInterface
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
     * @return MediaEmbedInterface
     */
    public function setWidth($width = null);
}