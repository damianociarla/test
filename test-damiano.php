<?php

use UEC\Media\Provider\Embed\Builder\EmbedMediaBuilderAdapter;
use UEC\Media\Provider\Embed\Parser\EmbedParser;
use UEC\Media\Builder\MediaBuilderManager;
use UEC\Media\Provider\Embed\Reader\EmbedReaderAdapter;
use UEC\Media\MediaFactory;
use UEC\Media\Reader\RemoteReader;

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "vendor/autoload.php";

$remoteReader = new RemoteReader('https://vimeo.com/96970478');
$embedAdapter = new EmbedReaderAdapter($remoteReader, new EmbedParser);

$media = MediaBuilderManager::createFromAdapter($embedAdapter, new EmbedMediaBuilderAdapter);

var_dump($media);
