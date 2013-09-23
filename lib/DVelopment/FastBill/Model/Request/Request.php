<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 21:04
 */

namespace DVelopment\FastBill\Model\Request;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("FBAPI")
 */
class Request
{
    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("SERVICE")
     */
    protected $service;

    /**
     * @var array
     *
     * @JMS\Type("array<string, string>")
     * @JMS\SerializedName("FILTER")
     */
    protected $filter;

    /**
     * @param $service
     * @param array $filter
     */
    public function __construct($service, array $filter = array())
    {
        $this->service = $service;
        $this->filter = $filter;
    }

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param string $service
     *
     * @return Request
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * @return array
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param array $filter
     *
     * @return Request
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;

        return $this;
    }
}