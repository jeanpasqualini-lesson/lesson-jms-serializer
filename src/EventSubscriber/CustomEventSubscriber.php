<?php
/**
 * Created by PhpStorm.
 * User: darkilliant
 * Date: 3/10/15
 * Time: 10:52 AM
 */

namespace EventSubscriber;


use Data\Person;
use Data\Place;
use JMS\Serializer\Annotation\PostSerialize;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use JMS\Serializer\EventDispatcher\PreSerializeEvent;
use JMS\Serializer\JsonSerializationVisitor;

class CustomEventSubscriber implements EventSubscriberInterface {
    /**
     * Returns the events to which this class has subscribed.
     *
     * Return format:
     *     array(
     *         array('event' => 'the-event-name', 'method' => 'onEventName', 'class' => 'some-class', 'format' => 'json'),
     *         array(...),
     *     )
     *
     * The class may be omitted if the class wants to subscribe to events of all classes.
     * Same goes for the format key.
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
           array(
               "event" => Events::PRE_SERIALIZE,
               "method" => "onPreSerialize"
           ),
           array(
               "event" => Events::POST_SERIALIZE,
               "method" => "onPostSerialize"
           ),
           array(
               "event" => Events::PRE_DESERIALIZE,
               "method" => "onPreDeserialize"
           )
        );
        // TODO: Implement getSubscribedEvents() method.
    }

    public function onPreDeserialize(PreDeserializeEvent $event)
    {
        $data = $event->getData();

        if(is_array($data) && isset($data["__CLASS__"]))
        {
            $class = $data["__CLASS__"];

            unset($data["__CLASS__"]);

            $event->setType($class);
        }
    }

    public function onPreSerialize(PreSerializeEvent $event)
    {
        if($event->getObject() instanceof Person)
        {
            $event->getVisitor()->setRoot("dd");
        }
    }

    public function onPostSerialize(ObjectEvent $event)
    {
        if($event->getObject() instanceof Person)
        {
            $event->getVisitor()->setRoot("popo");
        }

        if($event->getVisitor() instanceof JsonSerializationVisitor)
        {
            if(is_object($event->getObject()))
            {
                $event->getVisitor()->addData("__CLASS__", get_class($event->getObject()));
            }
        }
    }

}