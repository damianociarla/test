<?php

use Doctrine\Common\Util\Debug;
use UEC\Media\Builder\MediaBuilderManager;
use UEC\Media\Adapter\DimensionAdapter;
use UEC\Media\Adapter\EmbedAdapter;
use UEC\Media\Adapter\LocalSizeAdapter;
use UEC\Media\Adapter\RemoteSizeAdapter;
use UEC\Media\MediaFactory;
use UEC\Media\Reader\RemoteReader;
use UEC\Media\RemoteUri;

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "vendor/autoload.php";

$remoteReader = new RemoteReader('https://vimeo.com/96970478');
$embedAdapter = new EmbedAdapter($remoteReader, new EmbedParser());

$media = MediaBuilderManager::createFromAdapter($embedAdapter);

var_dump($media);
