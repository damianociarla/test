<?php

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Events;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Tools\Setup;
use Event\EventDispatcher;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use UEC\MediaUploader\Core\Adapter\Common\RemoteFile;
use UEC\MediaUploader\Core\Adapter\Validator\SizeValidator;
use UEC\MediaUploader\Core\Factory\ContextConfigurationFactory;
use UEC\MediaUploader\Core\Filesystem\Common\Generator\FilenameGenerator;
use UEC\MediaUploader\Core\Filesystem\Common\Generator\PathGenerator;
use UEC\MediaUploader\Core\MediaManager;
use UEC\MediaUploader\Core\Resolver\ResolverMediaType;
use UEC\MediaUploader\Core\Services\CoreMediaService;
use UEC\MediaUploader\Filesystem\Flysystem\Flysystem;
use UEC\MediaUploader\Mapper\Doctrine\Listener\DoctrineEventListener;
use UEC\MediaUploader\Mapper\Doctrine\ORM\MediaObjectPersistence;
use UEC\MediaUploader\Mapper\Doctrine\ORM\MediaObjectRepository;
use UEC\MediaUploader\Mapper\Doctrine\MediaManager as DoctrineMediaManager;
use UEC\MediaUploader\Mapper\Doctrine\MediaTypeManager as DoctrineMediaTypeManager;
use UEC\MediaUploader\Type\Image\Adapter\Validator\DimensionValidator;
use UEC\MediaUploader\Type\Image\Analyzer\ImageAnalyzer;
use UEC\MediaUploader\Type\Image\Configuration\TypeImageConfiguration;
use UEC\MediaUploader\Type\Image\Initializer\ImageInitializer;

include_once 'vendor/autoload.php';

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

$mediaImageModuleConfiguration = new TypeImageConfiguration(
    new DoctrineMediaTypeManager($mediaObjectPersistence, $mediaObjectRepository, 'Entity\MediaTypeImage'),
    new CoreMediaService(
        new Flysystem(new Filesystem(new Local('./uploads'))),
        new FilenameGenerator(),
        new PathGenerator()
    ),
    new ImageInitializer(),
    new ImageAnalyzer()
);

$typeConfiguration = array(
    'image' => $mediaImageModuleConfiguration,
    'avatar' => $mediaImageModuleConfiguration,
);

$contextConfigurationFactory = new ContextConfigurationFactory($typeConfiguration);

$mediaManager = new MediaManager($doctrineMediaManager, $contextConfigurationFactory, new EventDispatcher());

$entityManager->getEventManager()->addEventListener(array(Events::postLoad), new DoctrineEventListener(new ResolverMediaType($contextConfigurationFactory)));

$adapter = new RemoteFile('http://40.media.tumblr.com/73dfa6e433eb28560543e0bd71ee8a50/tumblr_nkdh18I85R1qzy9ouo1_1280.jpg');
$adapter->addValidator(new SizeValidator(['min' => 300]));
$adapter->addValidator(new DimensionValidator(['minWidth' => 300]));

$file = $mediaManager->save('avatar', $adapter);

echo sprintf('Media with id %s and size %s byte', $file->getId(), $file->getMediaType()->getSize());
