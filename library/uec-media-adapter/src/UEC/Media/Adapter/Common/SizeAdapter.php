<?php

namespace UEC\Media\Adapter\Common;

use UEC\Media\Adapter\AbstractAdapter;
use UEC\Media\MediaInterface;
use UEC\Media\Source\Common\BlobSourceInterface;
use UEC\Media\Source\Common\ContentSourceInterface;
use UEC\Media\Source\Common\UploadSourceInterface;
use UEC\Media\Source\SourceInterface;

class SizeAdapter extends AbstractAdapter implements RemoteSizeAdapterInterface
{
    protected function supports(SourceInterface $source)
    {
        return (
            $source instanceof BlobSourceInterface
            || $source instanceof ContentSourceInterface
            || $source instanceof UploadSourceInterface
        );
    }

    public function getSize()
    {
        $size = 0;

        switch (true) {
            case ($this->source instanceof BlobSourceInterface):
                $size = strlen($this->source->getSource());
                break;
            case ($this->source instanceof ContentSourceInterface):
                $size = filesize($this->source->getSource());
                break;
            case ($this->source instanceof UploadSourceInterface):
                $file = $this->source->getSource();
                $size = $file['size'];
                break;
        }

        return $size;
    }
}