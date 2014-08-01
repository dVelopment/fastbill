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
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("LIMIT")
     */
    protected $limit = 100;

    /**
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("OFFSET")
     */
    protected $offset = 100;



    /**
     * @param $service
     * @param array $filter
     */
    public function __construct($service, array $filter = array(), $limit = 100, $offset = 0)
    {
        $this->service = $service;
        $this->filter = $filter;
        $this->limit = $limit;
        $this->offset = $offset;
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

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param mixed $limit
     *
     * @return Request
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param mixed $offset
     *
     * @return Request
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;

        return $this;
    }
}