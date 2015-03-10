<?php

namespace UEC\MediaUploader\Core\Adapter;

class AdapterManager extends AbstractAdapterManager
{
    public function save(AdapterInterface $adapter, $context)
    {
        if ($adapter instanceof AdapterContentInterface) {
            $finalPath = $this->generateFinalPath($context, $adapter);
            $this->filesystem->put($finalPath, file_get_contents($adapter->getPath()));
            if ($adapter->getRemoveOriginal()) {
                unlink($adapter->getPath());
            }
        } elseif ($adapter instanceof AdapterBlobInterface) {
            $finalPath = $this->generateFinalPath($context, $adapter);
            $this->filesystem->put($finalPath, $adapter->getBlob());
        } elseif ($adapter instanceof AdapterStreamInterface) {
            $finalPath = $this->generateFinalPath($context, $adapter);
            $stream = fopen($adapter->getPath(), 'r+');
            $this->filesystem->writeStream($finalPath, $stream);
            fclose($stream);
        } else {
            $finalPath = $adapter->getPath();
        }

        return $finalPath;
    }

    protected function generateFinalPath($context, AdapterInterface $adapter)
    {
        return sprintf('%s/%s',
            $this->pathGenerator->generate($context, $adapter->getPath()),
            $this->filenameGenerator->generate($context, $adapter->getPath())
        );
    }
}