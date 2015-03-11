<?php
/**
 * Created by PhpStorm.
 * User: darkilliant
 * Date: 3/11/15
 * Time: 10:11 AM
 */

namespace Traits;


trait ClassDirectory {
    public static function getClass()
    {
        return __CLASS__;
    }

    public static function getDirectory()
    {
        return __DIR__;
    }

}