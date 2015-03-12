<?php

namespace UEC\Media\Adapter;

use UEC\Media\EmbedParser\ParserInterface;

interface EmbedAdapterInterface
{
    /**
     * Set parser
     *
     * @param ParserInterface $parser
     * @return EmbedAdapterInterface
     */
    public function setParser(ParserInterface $parser);

    /**
     * Get type
     *
     * @return mixed
     * @throws \Exception
     */
    public function getType();

    /**
     * Get title
     *
     * @return mixed
     * @throws \Exception
     */
    public function getTitle();

    /**
     * Get description
     *
     * @return mixed
     * @throws \Exception
     */
    public function getDescription();

    /**
     * Get url
     *
     * @return mixed
     * @throws \Exception
     */
    public function getUrl();

    /**
     * Get thumbnail url
     *
     * @return mixed
     * @throws \Exception
     */
    public function getThumbnailUrl();

    /**
     * Get thumbnail width
     *
     * @return mixed
     * @throws \Exception
     */
    public function getThumbnailWidth();

    /**
     * Get thumbnail height
     *
     * @return mixed
     * @throws \Exception
     */
    public function getThumbnailHeight();

    /**
     * Get html
     *
     * @return mixed
     * @throws \Exception
     */
    public function getHtml();

    /**
     * Get width
     *
     * @return mixed
     * @throws \Exception
     */
    public function getWidth();

    /**
     * Get height
     *
     * @return mixed
     * @throws \Exception
     */
    public function getHeight();

    /**
     * Get author name
     *
     * @return mixed
     * @throws \Exception
     */
    public function getAuthorName();

    /**
     * Get author url
     *
     * @return mixed
     * @throws \Exception
     */
    public function getAuthorUrl();

    /**
     * Get provider name
     *
     * @return mixed
     * @throws \Exception
     */
    public function getProviderName();

    /**
     * Get provider url
     *
     * @return mixed
     * @throws \Exception
     */
    public function getProviderUrl();
}