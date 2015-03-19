<?php

namespace UEC\MediaUploader\Extension\PdfImageExtractor\Mapper\Doctrine\Listener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use UEC\MediaUploader\Extension\PdfImageExtractor\Listener\AbstractMediaResolverInjection;
use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfInterface;

class DoctrineEventListener extends AbstractMediaResolverInjection
{
    public function postLoad(LifecycleEventArgs $args)
    {
        $object = $args->getObject();

        if ($object instanceof MediaTypePdfInterface) {
            $this->injectPageResolverOnLoadOnLoad($object);
        }
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $object = $args->getObject();

        if ($object instanceof MediaTypePdfInterface) {
            $this->injectPageResolverOnLoadOnLoad($object);
        }
    }
}