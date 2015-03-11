<?php
/**
 * Created by PhpStorm.
 * User: darkilliant
 * Date: 3/11/15
 * Time: 10:34 AM
 */

namespace Test;


use Data\CustomHandlerTest\Test;
use Interfaces\TestInterface;
use JMS\Serializer\Serializer;

class CustomHandlerTest implements TestInterface {

    public function runTest(Serializer $serializer)
    {
        // TODO: Implement runTest() method.

        $dataTest = new Test();

        echo "result : ".$serializer->serialize($dataTest, "json").PHP_EOL;
    }

}