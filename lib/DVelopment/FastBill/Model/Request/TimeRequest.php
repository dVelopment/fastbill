<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 22:08
 */

namespace DVelopment\FastBill\Model\Request;


use DVelopment\FastBill\Model\Time;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("FBAPI")
 */
class TimeRequest extends Request
{
    /**
     * @var Time
     *
     * @JMS\SerializedName("DATA")
     * @JMS\Type("DVelopment\FastBill\Model\Time")
     */
    protected $data;

    /**
     * @param string $service
     * @param array $filter
     * @param Time $time
     */
    public function __construct($service, array $filter = array(), Time $time = null)
    {
        parent::__construct($service, $filter);
        $this->data = $time;
    }

    /**
     * @return \DVelopment\FastBill\Model\Time
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \DVelopment\FastBill\Model\Time $data
     *
     * @return TimeRequest
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}