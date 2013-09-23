<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 22:25
 */

namespace DVelopment\FastBill\Model\Request;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("FBAPI")
 */
class DeleteRequest extends Request
{
    /**
     * @var array
     *
     * @JMS\Type("array<string, string>")
     * @JMS\SerializedName("DATA")
     */
    protected $data;

    /**
     * @param $service
     * @param array $data
     * @param array $filter
     */
    public function __construct($service, array $data = array(), array $filter = array())
    {
        parent::__construct($service, $filter);

        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return Request
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}