<?php
/**
 * Created by PhpStorm.
 * User: darkilliant
 * Date: 3/11/15
 * Time: 10:14 AM
 */

namespace Data\YamlTest;


class Test {

    private $three = "three";

    private $one = "one";

    private $two = "two";

    private $five;

    /**
     * @var string
     */
    private $versionOne = "version 1";

    /**
     * @var string
     */
    private $versionTwo = "version 2";

    /**
     * @var string
     */
    private $groupOne = "group 1";

    /**
     * @var string
     */
    private $groupTwo = "group 2";

    /**
     * @var string
     */
    private $exclude = "exclude";

    /**
     * @return string
     */
    public function getFoor()
    {
        return "foor";
    }

    public function getOne()
    {
        return $this->one;
    }

    public function getTwo()
    {
        return $this->two;
    }

    public function getThree()
    {
        return $this->three;
    }

    public function setOne($one)
    {
        $this->one = $one;
    }

    public function setTwo($two)
    {
        $this->two = $two;
    }

    public function setThree($three)
    {
        $this->three = $three;
    }

    public function getExclude()
    {
        return $this->exclude;
    }

    public function setExclude($exclude)
    {
        $this->exclude = $exclude;
    }

    public function getFive()
    {
        return $this->five;
    }

    public function setFive($five)
    {
        $this->five = $five;
    }

    /**
     * @return void
     */
    public function updateData()
    {
        $this->five = "five";
    }
}