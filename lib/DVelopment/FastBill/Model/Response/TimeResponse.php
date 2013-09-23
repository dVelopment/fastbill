<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 22:10
 */

namespace DVelopment\FastBill\Model\Response;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("RESPONSE")
 */
class TimeResponse
{
    /**
     * @var array
     *
     * @JMS\Type("array<DVelopment\FastBill\Model\Time>")
     * @JMS\SerializedName("TIMES")
     */
    private $times = array();

    /**
     * @return array
     */
    public function getTimes()
    {
        return $this->times;
    }

    /**
     * @param array $times
     *
     * @return TimeResponse
     */
    public function setTimes($times)
    {
        $this->times = $times;

        return $this;
    }
}