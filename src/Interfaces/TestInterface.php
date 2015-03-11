<?php
/**
 * Created by PhpStorm.
 * User: darkilliant
 * Date: 3/10/15
 * Time: 8:49 AM
 */

namespace Interfaces;


use JMS\Serializer\Serializer;

interface TestInterface {
    public function runTest(Serializer $serializer);
}