<?php

namespace UEC\MediaUploader\Core\Doctrine\Listener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use UEC\MediaUploader\Core\Listener\MediaTypeInjection;
use UEC\MediaUploader\Core\Model\MediaInterface;

class DoctrineEventListener extends MediaTypeInjection
{
    public function postLoad(LifecycleEventArgs $args)
    {
        $object = $args->getObject();

        if ($object instanceof MediaInterface) {
            $this->injectMediaTypeOnLoad($object);
        }
    }
}