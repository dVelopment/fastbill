<?php
/**
 * @package fastbill
 *
 * @author Artur Wawrzynkiewicz <aw@appandweb.de>
 * @date 11.11.2015
 * @time 16:43
 */

namespace DVelopment\FastBill\Model\Request;


use DVelopment\FastBill\Model\Subscription;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("FBAPI")
 */
class SubscriptionRequest extends Request
{
    /**
     * @var Subscription
     *
     * @JMS\SerializedName("DATA")
     * @JMS\Type("DVelopment\FastBill\Model\Subscription")
     */
    protected $data;

    /**
     * @param string $service
     * @param array $filter
     * @param Subscription $subscription
     */
    public function __construct($service, array $filter = array(), Subscription $subscription = null)
    {
        parent::__construct($service, $filter);
        $this->data = $subscription;
    }

    /**
     * @return \DVelopment\FastBill\Model\Subscription
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \DVelopment\FastBill\Model\Subscription $data
     *
     * @return SubscriptionRequest
     */
    public function setData(Subscription $data)
    {
        $this->data = $data;

        return $this;
    }
}