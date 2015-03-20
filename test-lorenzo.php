<?php

use League\CLImate\CLImate;
use UEC\Media\Destination\Console\ConsoleDestination;
use UEC\Media\Manager\MediaManager;
use UEC\Media\Provider\Embed\Adapter\EmbedAdapter;
use UEC\Media\Provider\Embed\Builder\EmbedMediaBuilder;
use UEC\Media\Provider\Embed\Builder\EmbedMediaBuilderAdapter;
use UEC\Media\Provider\Embed\Destination\ConsoleDestinationFilter;
use UEC\Media\Provider\Embed\Model\MediaEmbed;
use UEC\Media\Provider\Embed\Parser\EmbedParser;
use UEC\Media\Builder\MediaBuilderManager;
use UEC\Media\MediaFactory;

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "vendor/autoload.php";

$embedAdapter = new EmbedAdapter();
$embedAdapter->setParser(new EmbedParser);

$reader = new \UEC\Media\Reader\Reader('https://vimeo.com/96970478', $embedAdapter);

$media = MediaBuilderManager::createFromReader($reader, new EmbedMediaBuilder);

$climateShower = new CLIMateShower(new CLImate);

$mediaManager = new MediaManager();
$mediaManager->setMedia($media);
$mediaManager->setReader($reader);
$mediaManager->addDestination(new ConsoleDestination($climateShower), new ConsoleDestinationFilter);
$mediaManager->exec();




//var_dump($media);



//echo get_class($media->getProvider());
//var_dump($media);
