<?php
/**
 * Created by PhpStorm.
 * User: darkilliant
 * Date: 3/11/15
 * Time: 9:24 AM
 */

namespace Data\XmlTest;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Xml
 * @package Data
 * @JMS\XmlRoot("XML")
 */
class Xml {

    /**
     * @var string
     * @JMS\XmlAttribute
     */
    private $id = "identity";

    /**
     * @var string
     * @JMS\XmlValue
     * @JMS\XmlElement(cdata=false)
     */
    private $value = "value";
}