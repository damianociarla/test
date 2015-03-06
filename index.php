<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use CDN\CDNBase;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Util\Debug;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Events;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Tools\Setup;
use Event\EventDispatcher;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Pdf\Parser\ImagickParser;
use UEC\MediaUploader\Core\Adapter\Common\RemoteFile;
use UEC\MediaUploader\Core\Adapter\Validator\Common\SizeValidator;
use UEC\MediaUploader\Core\Factory\ContextLocator;
use UEC\MediaUploader\Core\Filesystem\Common\Generator\FilenameGenerator;
use UEC\MediaUploader\Core\Filesystem\Common\Generator\PathGenerator;
use UEC\MediaUploader\Core\MediaManager;
use UEC\MediaUploader\Core\Resolver\ResolverMediaType;
use UEC\MediaUploader\Core\Services\CoreMediaService;
use UEC\MediaUploader\Filesystem\Flysystem\Flysystem;
use UEC\MediaUploader\Mapper\Doctrine\Listener\DoctrineEventListener;
use UEC\MediaUploader\Mapper\Doctrine\MediaManager as DoctrineMediaManager;
use UEC\MediaUploader\Mapper\Doctrine\MediaTypeManager as DoctrineMediaTypeManager;
use UEC\MediaUploader\Mapper\Doctrine\ORM\MediaObjectPersistence;
use UEC\MediaUploader\Mapper\Doctrine\ORM\MediaObjectRepository;
use UEC\MediaUploader\Type\Embed\Adapter\EmbedFile;
use UEC\MediaUploader\Type\Embed\Analyzer\EmbedAnalyzer;
use UEC\MediaUploader\Type\Embed\Configuration\TypeEmbedConfiguration;
use UEC\MediaUploader\Type\Embed\Initializer\EmbedInitializer;
use UEC\MediaUploader\Type\Image\Adapter\Validator\DimensionValidator;
use UEC\MediaUploader\Type\Image\Analyzer\ImageAnalyzer;
use UEC\MediaUploader\Type\Image\Configuration\TypeImageConfiguration;
use UEC\MediaUploader\Type\Image\Initializer\ImageInitializer;
use UEC\MediaUploader\Type\Pdf\Analyzer\PdfAnalyzer;
use UEC\MediaUploader\Type\Pdf\Configuration\TypePdfConfiguration;
use UEC\MediaUploader\Type\Pdf\Initializer\PdfInitializer;

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
    new CDNBase(),
    new ImageInitializer(),
    new ImageAnalyzer()
);

$mediaEmbedModuleConfiguration = new TypeEmbedConfiguration(
    new DoctrineMediaTypeManager($mediaObjectPersistence, $mediaObjectRepository, 'Entity\MediaTypeEmbed'),
    new CoreMediaService(
        new Flysystem(new Filesystem(new Local('./uploads'))),
        new FilenameGenerator(),
        new PathGenerator()
    ),
    new CDNBase(),
    new EmbedInitializer(),
    new EmbedAnalyzer(new EmbedParser())
);

$mediaPdfModuleConfiguration = new TypePdfConfiguration(
    new DoctrineMediaTypeManager($mediaObjectPersistence, $mediaObjectRepository, 'Entity\MediaTypePdf'),
    new CoreMediaService(
        new Flysystem(new Filesystem(new Local('./uploads'))),
        new FilenameGenerator(),
        new PathGenerator()
    ),
    new CDNBase(),
    new PdfInitializer(),
    new PdfAnalyzer(new PdfParser())
);

$contextLocatorConfiguration = array(
    'image' => $mediaImageModuleConfiguration,
    'embed' => $mediaEmbedModuleConfiguration,
    'pdf'   => $mediaPdfModuleConfiguration,
);

$contextLocator = new ContextLocator($contextLocatorConfiguration);

$mediaManager = new MediaManager($doctrineMediaManager, $contextLocator, new EventDispatcher());

$entityManager->getEventManager()->addEventListener(array(Events::postLoad), new DoctrineEventListener(new ResolverMediaType($contextLocator)));

/**
 * Esempio salvataggio immagine remota
 */
//$adapterRemote = new RemoteFile('http://40.media.tumblr.com/73dfa6e433eb28560543e0bd71ee8a50/tumblr_nkdh18I85R1qzy9ouo1_1280.jpg');
//$adapterRemote->addValidator(new SizeValidator(array(
//    SizeValidator::SIZE_MIN => 300
//)));
//$adapterRemote->addValidator(new DimensionValidator(array(
//    DimensionValidator::DIMENSION_MIN_WIDTH => 300
//)));
//
//$file = $mediaManager->save($adapterRemote, 'image');

/**
 * Esempio salvataggio embed
 */
$adapterEmbed = new EmbedFile('https://vimeo.com/96970478');
$file = $mediaManager->save($adapterEmbed, 'embed');

/**
 * Esempio salvataggio pdf remoto
 */
//$adapterRemote = new RemoteFile('http://desportoescolar.dge.mec.pt/sites/default/files/newsletters/newsletter1.pdf');
//$file = $mediaManager->save($adapterRemote, 'pdf');
//
Debug::dump($file);
