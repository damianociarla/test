<?php

use UEC\Media\Provider\Embed\Adapter\EmbedAdapter;
use UEC\Media\Provider\Embed\Builder\EmbedMediaBuilder;
use UEC\Media\Provider\Embed\Builder\EmbedMediaBuilderAdapter;
use UEC\Media\Provider\Embed\Parser\EmbedParser;
use UEC\Media\Builder\MediaBuilderManager;
use UEC\Media\MediaFactory;

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "vendor/autoload.php";

$embedAdapter = new EmbedAdapter('https://vimeo.com/96970478');
$embedAdapter->setParser(new EmbedParser);

$media = MediaBuilderManager::createFromAdapter($embedAdapter, new EmbedMediaBuilder);

var_dump($media);
