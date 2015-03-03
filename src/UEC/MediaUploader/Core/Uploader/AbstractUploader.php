<?php

namespace UEC\MediaUploader\Core\Uploader;

use UEC\MediaUploader\Core\CDN\CDNInterface;
use UEC\MediaUploader\Core\Filesystem\FilenameGeneratorInterface;
use UEC\MediaUploader\Core\Filesystem\PathGeneratorInterface;

abstract class AbstractUploader implements UploaderInterface
{
    protected $cdn;
    protected $filenameGenerator;
    protected $pathGenerator;

    function __construct(CDNInterface $cdn, FilenameGeneratorInterface $filenameGenerator, PathGeneratorInterface $pathGenerator)
    {
        $this->cdn = $cdn;
        $this->filenameGenerator = $filenameGenerator;
        $this->pathGenerator = $pathGenerator;
    }

    public function getCdn()
    {
        return $this->cdn;
    }

    public function setCdn(CDNInterface $cdn)
    {
        $this->cdn = $cdn;
        return $this;
    }

    public function getFilenameGenerator()
    {
        return $this->filenameGenerator;
    }

    public function setFilenameGenerator(FilenameGeneratorInterface $filenameGenerator)
    {
        $this->filenameGenerator = $filenameGenerator;
        return $this;
    }

    public function getPathGenerator()
    {
        return $this->pathGenerator;
    }

    public function setPathGenerator(PathGeneratorInterface $pathGenerator)
    {
        $this->pathGenerator = $pathGenerator;
        return $this;
    }
}