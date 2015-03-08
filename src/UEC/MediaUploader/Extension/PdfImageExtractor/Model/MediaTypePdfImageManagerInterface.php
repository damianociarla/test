<?php

namespace UEC\MediaUploader\Extension\PdfImageExtractor\Model;

use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfInterface;

interface MediaTypePdfImageManagerInterface
{
    /**
     * Create or update an instance of MediaTypePdfImage
     *
     * @param MediaTypePdfImage $mediaTypePdfImage
     */
    public function save(MediaTypePdfImage $mediaTypePdfImage);

    /**
     * Remove an instance of MediaTypePdfImage
     *
     * @param MediaTypePdfImage $mediaTypePdfImage
     */
    public function remove(MediaTypePdfImage $mediaTypePdfImage);

    /**
     * Create a new empty instance of MediaTypePdfImage
     *
     * @return MediaTypePdfImage
     */
    public function create();

    /**
     * Find media by id
     *
     * @param MediaTypePdfInterface|int $id
     * @return array
     */
    public function findAllByMedia($id);

    /**
     * Find media by id and page
     *
     * @param MediaTypePdfInterface|int $id
     * @param int $page
     * @return MediaTypePdfImageInterface|null
     */
    public function findByMediaAndPage($id, $page);

    /**
     * Get path of the Media class
     *
     * @return string
     */
    public function getClassName();

    /**
     * Check if the instance of MediaTypePdfImage is persisted
     *
     * @param MediaTypePdfImage $mediaTypePdfImage
     * @return bool
     */
    public function isNewMediaTypePdfImage(MediaTypePdfImage $mediaTypePdfImage);
}