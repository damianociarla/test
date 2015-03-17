<?php

use UEC\Media\Provider\Embed\Adapter\EmbedAdapter;
use UEC\Media\Provider\Embed\Builder\EmbedMediaBuilder;
use UEC\Media\Provider\Embed\Builder\EmbedMediaBuilderAdapter;
use UEC\Media\Provider\Embed\Parser\EmbedParser;
use UEC\Media\Builder\MediaBuilderManager;
use UEC\Media\MediaFactory;
use UEC\Media\Provider\Embed\Source\RemoteSource;

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "vendor/autoload.php";

$remoteSource = new RemoteSource('https://vimeo.com/96970478');

$embedAdapter = new EmbedAdapter($remoteSource);
$embedAdapter->setParser(new EmbedParser);

$media = MediaBuilderManager::createFromAdapter($embedAdapter, new EmbedMediaBuilder);

var_dump($media);
