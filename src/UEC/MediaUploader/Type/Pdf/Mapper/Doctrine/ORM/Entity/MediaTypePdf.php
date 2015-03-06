<?php

namespace UEC\MediaUploader\Type\Pdf\Mapper\Doctrine\ORM\Entity;

use Doctrine\ORM\Mapping as ORM;
use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdf as BaseMediaTypePdf;

/**
 * @ORM\MappedSuperclass
 */
abstract class MediaTypePdf extends BaseMediaTypePdf
{
    /**
     * @ORM\Column(type="integer")
     */
    protected $size;

    /**
     * @ORM\Column(name="total_page_number", type="integer")
     */
    protected $totalPageNumber;
}