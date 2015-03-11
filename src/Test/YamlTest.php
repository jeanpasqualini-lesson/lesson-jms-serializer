<?php
/**
 * Created by PhpStorm.
 * User: darkilliant
 * Date: 3/11/15
 * Time: 10:38 AM
 */

namespace Test;


use Data\YamlTest\Test;
use Interfaces\TestInterface;
use JMS\Serializer\Serializer;
use JMS\Serializer\Exclusion\GroupsExclusionStrategy;
use JMS\Serializer\SerializationContext;


class YamlTest implements TestInterface {

    public function runTest(Serializer $serializer)
    {
        $formats = array("json", "xml");
        $versions = array("1.0.0", "2.0.0");
        $groups = array("one", "two");

        $this->printSection("formats", $formats);

        $dataTest = new Test();

        foreach($formats as $format)
        {
            echo "$format : ".$serializer->serialize($dataTest, $format).PHP_EOL;
        }

        $this->printSection("versions", $versions);

        foreach($versions as $version)
        {
            $context = SerializationContext::create()
                ->setVersion($version)
            ;

            echo "$version : ".$serializer->serialize($dataTest, "xml", $context).PHP_EOL;
        }

        $this->printSection("groups", $versions);

        foreach($groups as $group)
        {
            $context = SerializationContext::create()
                ->setGroups(array(GroupsExclusionStrategy::DEFAULT_GROUP, $group))
            ;

            echo "$group : ".$serializer->serialize($dataTest, "xml", $context).PHP_EOL;
        }
    }

    private function printSection($name, $data)
    {
        echo "=== $name : ".implode(" - ", $data)." ===".PHP_EOL;
    }

}