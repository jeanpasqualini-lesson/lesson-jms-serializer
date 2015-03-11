<?php
/**
 * Created by PhpStorm.
 * User: darkilliant
 * Date: 3/11/15
 * Time: 10:48 AM
 */

namespace Test;


use Data\XmlTest\Xml;
use Interfaces\TestInterface;
use JMS\Serializer\Serializer;

class XmlKeyValueTest implements TestInterface {

    public function runTest(Serializer $serializer)
    {
        $dataTest = new Xml();

        echo "result : ".$serializer->serialize($dataTest, "xml").PHP_EOL;

        // TODO: Implement runTest() method.
    }

}