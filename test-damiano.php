<?php

use Doctrine\Common\Util\Debug;
use UEC\Media\Adapter\DimensionAdapter;
use UEC\Media\Adapter\LocalSizeAdapter;
use UEC\Media\Adapter\RemoteSizeAdapter;
use UEC\Media\MediaFactory;
use UEC\Media\Reader\RemoteReader;
use UEC\Media\RemoteUri;

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "vendor/autoload.php";

$reader = new RemoteReader(new RemoteUri('http://40.media.tumblr.com/73dfa6e433eb28560543e0bd71ee8a50/tumblr_nkdh18I85R1qzy9ouo1_1280.jpg'));

$media = MediaFactory::createFromReader($reader);

$remote = new RemoteSizeAdapter($media);

$dimension = new DimensionAdapter($remote);

Debug::dump($dimension->getWidth());
Debug::dump($dimension->getHeight());