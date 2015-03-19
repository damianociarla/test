<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use \UEC\Media\Reader;

include "vendor/autoload.php";

$readerPluginManager = new Reader\ReaderPluginManager();
$readerPluginManager->setService('size', new Reader\Plugin\RemoteReaderSizePlugin());

$reader = new Reader\RemoteReader("https://vimeo.com/120197450");
$reader->setPluginManager($readerPluginManager);
var_dump($reader->has('size'));
var_dump($reader->size());