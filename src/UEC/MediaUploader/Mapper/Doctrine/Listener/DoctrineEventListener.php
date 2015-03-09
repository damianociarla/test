<?php

namespace UEC\MediaUploader\Mapper\Doctrine\Listener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use UEC\MediaUploader\Core\Listener\AbstractMediaTypeResolverInjection;
use UEC\MediaUploader\Core\Model\MediaInterface;

class DoctrineEventListener extends AbstractMediaTypeResolverInjection
{
    public function postLoad(LifecycleEventArgs $args)
    {
        $object = $args->getObject();

        if ($object instanceof MediaInterface) {
            $this->injectMediaTypeResolverOnLoad($object);
        }
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $object = $args->getObject();

        if ($object instanceof MediaInterface) {
            $this->injectMediaTypeResolverOnLoad($object);
        }
    }
}