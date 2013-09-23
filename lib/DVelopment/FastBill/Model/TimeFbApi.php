<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 22:09
 */

namespace DVelopment\FastBill\Model;


use DVelopment\FastBill\Model\Response\TimeResponse;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("FBAPI")
 */
class TimeFbApi extends FbApi
{
    /**
     * @var TimeResponse
     *
     * @JMS\Type("DVelopment\FastBill\Model\Response\TimeResponse")
     * @JMS\SerializedName("RESPONSE")
     */
    protected $response;

    /**
     * @return \DVelopment\FastBill\Model\Response\TimeResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param \DVelopment\FastBill\Model\Response\TimeResponse $response
     *
     * @return TimeFbApi
     */
    public function setResponse(TimeResponse $response)
    {
        $this->response = $response;

        return $this;
    }
}