<?php

use UEC\Media\Builder\Adapter\EmbedMediaBuilder;
use UEC\Media\Builder\MediaBuilderManager;
use UEC\Media\Reader\Adapter\EmbedAdapter;
use UEC\Media\MediaFactory;
use UEC\Media\Reader\RemoteReader;

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "vendor/autoload.php";

$remoteReader = new RemoteReader('https://vimeo.com/96970478');
$embedAdapter = new EmbedAdapter($remoteReader, new EmbedParser);

$media = MediaBuilderManager::createFromAdapter($embedAdapter, new EmbedMediaBuilder);

var_dump($media);
