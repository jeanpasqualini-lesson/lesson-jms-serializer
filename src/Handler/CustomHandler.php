<?php
/**
 * Created by PhpStorm.
 * User: darkilliant
 * Date: 3/10/15
 * Time: 10:07 AM
 */

namespace Handler;

use Data\CustomHandlerTest\Test;
use JMS\Serializer\Context;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\NavigatorContext;

class CustomHandler implements SubscribingHandlerInterface {
    /**
     * Return format:
     *
     *      array(
     *          array(
     *              'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
     *              'format' => 'json',
     *              'type' => 'DateTime',
     *              'method' => 'serializeDateTimeToJson',
     *          ),
     *      )
     *
     * The direction and method keys can be omitted.
     *
     * @return array
     */
    public static function getSubscribingMethods()
    {
        return array(
            array(
                "direction" => \JMS\Serializer\GraphNavigator::DIRECTION_SERIALIZATION,
                "format" => "json",
                "type" => \Data\CustomHandlerTest\Test::getClass(),
                "method" => "serializeTest"
            )
        );
        // TODO: Implement getSubscribingMethods() method.
    }

    public function serializeTest(\JMS\Serializer\JsonSerializationVisitor $visitor, Test $test, array $type, Context $context)
    {
        $visitor->setRoot("modifyResultWithCustomHandler");
    }

}