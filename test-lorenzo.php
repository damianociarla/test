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

$embedAdapter = new EmbedAdapter();
$embedAdapter->setParser(new EmbedParser);

$reader = new \UEC\Media\Reader\Reader('https://vimeo.com/96970478', $embedAdapter);

//var_dump($reader->extract());

$media = MediaBuilderManager::createFromReader($reader, new EmbedMediaBuilder);

var_dump($media);



//echo get_class($media->getProvider());
//var_dump($media);
