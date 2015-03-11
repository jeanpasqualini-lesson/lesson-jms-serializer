<?php

require "../vendor/autoload.php";

define("ROOT_DIR", __DIR__);

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use Handler\CustomHandler;
use EventSubscriber\CustomEventSubscriber;

$tests = array(
    new \Test\AnnotationTest(),
    new \Test\CustomHandlerTest(),
    new \Test\YamlTest(),
    new \Test\XmlKeyValueTest(),
    new \Test\XmlTest()
);

AnnotationRegistry::registerLoader("class_exists");

$serializer = SerializerBuilder::create()
    ->setCacheDir(ROOT_DIR.DIRECTORY_SEPARATOR."cache")
    ->setDebug(true)
    ->addMetadataDir(ROOT_DIR.DIRECTORY_SEPARATOR."config", "")
    ->addDefaultHandlers()
    ->configureHandlers(function(HandlerRegistry $registry)
    {
        $registry->registerSubscribingHandler(new CustomHandler());
    })
    ->configureListeners(function(EventDispatcher $dispatcher)
    {
        $dispatcher->addSubscriber(new CustomEventSubscriber());
    })
    ->build()
;

foreach($tests as $test)
{
    echo "===".get_class($test)."===".PHP_EOL;

    $test->runTest($serializer);
}