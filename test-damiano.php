<?php

use Doctrine\Common\Util\Debug;
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

$vimeo = new RemoteReader(new RemoteUri('https://vimeo.com/96970478'));

$media = MediaFactory::createFromReader($vimeo);

$embedAdapter = new EmbedAdapter($media, new EmbedParser());

echo $embedAdapter->getTitle();
echo "\n";
echo $embedAdapter->getHtml();
echo "\n";
