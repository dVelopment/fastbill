<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 21:35
 */

namespace DVelopment\FastBill\Model;

use DVelopment\FastBill\Model\Response\SubscriptionResponse;
use DVelopment\FastBill\Model\Response\Response;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("FBAPI")
 */
class SubscriptionFbApi extends FbApi
{
    /**
     * @var SubscriptionResponse
     *
     * @JMS\Type("DVelopment\FastBill\Model\Response\SubscriptionResponse")
     * @JMS\SerializedName("RESPONSE")
     */
    protected $response;

    /**
     * @return \DVelopment\FastBill\Model\Response\SubscriptionResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param \DVelopment\FastBill\Model\Response\SubscriptionResponse $response
     *
     * @return FbApi
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;

        return $this;
    }
}