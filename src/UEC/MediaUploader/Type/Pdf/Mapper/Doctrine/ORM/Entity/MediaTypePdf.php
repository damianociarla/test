<?php

namespace UEC\MediaUploader\Type\Pdf\Mapper\Doctrine\ORM\Entity;

use Doctrine\ORM\Mapping as ORM;
use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdf as BaseMediaTypePdf;
use UEC\MediaUploader\Type\Pdf\Resolver\PageResolverManager;

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

    function __wakeup()
    {
        $this->pageResolverManager = new PageResolverManager();
    }
}