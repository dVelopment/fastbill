<?php
/**
 * @package fastbill
 *
 * @author Artur Wawrzynkiewicz <aw@appandweb.de>
 * @date 12.11.2015
 * @time 13:32
 */

namespace DVelopment\FastBill\Model;

use DVelopment\FastBill\Model\Response\SubscriptionSecureLinkResponse;
use DVelopment\FastBill\Model\Response\Response;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("FBAPI")
 */
class SubscriptionSecureLinkFbApi extends FbApi
{
    /**
     * @var SubscriptionSecureLinkResponse
     *
     * @JMS\Type("DVelopment\FastBill\Model\Response\SubscriptionSecureLinkResponse")
     * @JMS\SerializedName("RESPONSE")
     */
    protected $response;

    /**
     * @return \DVelopment\FastBill\Model\Response\SubscriptionSecureLinkResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param \DVelopment\FastBill\Model\Response\SubscriptionSecureLinkResponse $response
     *
     * @return FbApi
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;

        return $this;
    }
}