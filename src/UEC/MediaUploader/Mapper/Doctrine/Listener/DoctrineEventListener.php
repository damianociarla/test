<?php

namespace UEC\MediaUploader\Mapper\Doctrine\Listener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use UEC\MediaUploader\Core\Listener\AbstractResolverMediaTypeInjection;
use UEC\MediaUploader\Core\Model\MediaInterface;

class DoctrineEventListener extends AbstractResolverMediaTypeInjection
{
    public function postLoad(LifecycleEventArgs $args)
    {
        $object = $args->getObject();

        if ($object instanceof MediaInterface) {
            $this->injectResolverMediaTypeOnLoad($object);
        }
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $object = $args->getObject();

        if ($object instanceof MediaInterface) {
            $this->injectResolverMediaTypeOnLoad($object);
        }
    }
}