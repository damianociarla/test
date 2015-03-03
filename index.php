<?php

include_once 'vendor/autoload.php';

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Util\Debug;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Events;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Tools\Setup;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use UEC\MediaUploader\Core\Uploader\Common\Validator\SizeValidator;
use UEC\MediaUploader\Core\CDN\Common\Flysystem;
use UEC\MediaUploader\Core\Doctrine\Listener\DoctrineEventListener;
use UEC\MediaUploader\Core\Doctrine\ORM\MediaObjectPersistence;
use UEC\MediaUploader\Core\Doctrine\ORM\MediaObjectRepository;
use UEC\MediaUploader\Core\Factory\MediaManagerServicesFactory;
use UEC\MediaUploader\Core\Filesystem\Common\Generator\FilenameGenerator;
use UEC\MediaUploader\Core\Filesystem\Common\Generator\PathGenerator;
use UEC\MediaUploader\Core\MediaManager;
use UEC\MediaUploader\Core\Resolver\ResolverMediaType;
use UEC\MediaUploader\Core\Uploader\Adapter\RemoteFile;
use UEC\MediaUploader\Core\Uploader\Adapter\SimpleFile;
use UEC\MediaUploader\Core\Doctrine\MediaManager as DoctrineMediaManager;
use UEC\MediaUploader\Core\Doctrine\MediaTypeManager as DoctrineMediaTypeManager;
use UEC\MediaUploader\Core\Uploader\Common\SimpleUploader;
use UEC\MediaUploader\Image\Analyzer\ImageAnalyzer;
use UEC\MediaUploader\Image\Initializer\ImageInitializer;
use UEC\MediaUploader\Image\Services\ImageMediaManagerServices;
use UEC\MediaUploader\Image\Uploader\Validator\ImageValidator;

$paths = array('./src/Entity');
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'root',
    'dbname'   => 'media_uploader',
);

$config = Setup::createConfiguration($isDevMode);
$driver = new AnnotationDriver(new AnnotationReader(), $paths);

AnnotationRegistry::registerLoader('class_exists');
$config->setMetadataDriverImpl($driver);

$entityManager = EntityManager::create($dbParams, $config);

$mediaObjectPersistence = new MediaObjectPersistence($entityManager);
$mediaObjectRepository = new MediaObjectRepository($entityManager);

$doctrineMediaManager = new DoctrineMediaManager($mediaObjectPersistence, $mediaObjectRepository, 'Entity\Media');

$typeServices = array(
    'avatar' => new ImageMediaManagerServices(
        new DoctrineMediaTypeManager($mediaObjectPersistence, $mediaObjectRepository, 'Entity\MediaImage'),
        new FilenameGenerator(),
        new PathGenerator(),
        new Flysystem(new Filesystem(new Local('./uploads'))),
        new SimpleUploader(),
        new ImageInitializer(),
        new ImageAnalyzer()
    ),
);

$mediaManagerServicesFactory = new MediaManagerServicesFactory($typeServices);

$mediaManager = new MediaManager($doctrineMediaManager, $mediaManagerServicesFactory);

$entityManager->getEventManager()->addEventListener(array(Events::postLoad), new DoctrineEventListener(new ResolverMediaType($mediaManagerServicesFactory)));

$adapter = new RemoteFile('http://40.media.tumblr.com/73dfa6e433eb28560543e0bd71ee8a50/tumblr_nkdh18I85R1qzy9ouo1_1280.jpg');
$adapter->addValidator(new SizeValidator(['min' => 300]));
$adapter->addValidator(new ImageValidator(['minWidth' => 300]));

$file = $mediaManager->save('avatar', $adapter);

echo sprintf('Media with id %s and size %s byte', $file->getId(), $file->getMediaType()->getSize());
