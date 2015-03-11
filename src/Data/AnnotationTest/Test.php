<?php
/**
 * Created by PhpStorm.
 * User: darkilliant
 * Date: 3/11/15
 * Time: 9:43 AM
 */

namespace Data\AnnotationTest;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Test
 * @package Data\AnnotationTest
 * @JMS\XmlRoot("test")
 * @JMS\AccessorOrder("custom", custom = {"one", "two", "three"})
 * @JMS\AccessType("public_method")
 * @JMS\ExclusionPolicy("NONE")
 */
class Test {

    private $three = "three";

    private $one = "one";

    private $two = "two";

    private $five;

    /**
     * @var string
     *
     * @JMS\AccessType("property")
     * @JMS\SerializedName("version")
     * @JMS\Since("1.0.0")
     * @JMS\Until("2.0.0")
     */
    private $versionOne = "version 1";

    /**
     * @var string
     *
     * @JMS\AccessType("property")
     * @JMS\SerializedName("version")
     * @JMS\Since("2.0.0")
     * @JMS\Until("1.0.0")
     */
    private $versionTwo = "version 2";

    /**
     * @var string
     *
     * @JMS\AccessType("property")
     * @JMS\SerializedName("group")
     * @JMS\Groups({"one"})
     */
    private $groupOne = "group 1";

    /**
     * @var string
     *
     * @JMS\AccessType("property")
     * @JMS\SerializedName("group")
     * @JMS\Groups({"two"})
     */
    private $groupTwo = "group 2";

    /**
     * @var string
     * @JMS\Exclude
     */
    private $exclude = "exclude";

    /**
     * @return string
     * @JMS\VirtualProperty()
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
     * @JMS\PreSerialize
     */
    public function updateData()
    {
        $this->five = "five";
    }
}