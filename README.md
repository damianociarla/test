# test
media uploader

$reader = new RemoteReader($uri);

$decoratorManager = new DecoratorManager($reader);
$decoratorManager->addDecorator(new SizeDecorator);
$decoratorManager->addDecorator(new DimensionDecorator);
$decoratorManager->decorate();

$reader








$reader = new RemoteReader($uri);

$reader->addParser(new SizeParser());
$reader->addParser(new DimensionParser());

$reader->addValidator(new DimensionValidator(array(
    DimensionParser::MIN_WIDTH => 200 
)));

$media = $mediaFactory->createFromReader($reader);

$media->addWriter();