<?php

namespace UEC\MediaUploader\Core\Uploader;

abstract class AbstractUploader implements UploaderInterface
{
    protected $cdn;
    protected $filenameGenerator;
    protected $pathGenerator;

    public function setCdn($cdn)
    {
        $this->cdn = $cdn;
        return $this;
    }

    public function setFilenameGenerator($filenameGenerator)
    {
        $this->filenameGenerator = $filenameGenerator;
        return $this;
    }

    public function setPathGenerator($pathGenerator)
    {
        $this->pathGenerator = $pathGenerator;
        return $this;
    }
}