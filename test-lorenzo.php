<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use \UEC\Media\Reader;

include "vendor/autoload.php";

$reader = new Reader\RemoteReader("https://vimeo.com/120197450");
$readerWithSize = new Reader\Decorator\RemoteReaderSizeDecorator($reader);

var_dump($reader);
