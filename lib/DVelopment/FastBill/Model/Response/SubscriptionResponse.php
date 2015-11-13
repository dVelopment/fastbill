<?php
/**
 * @package fastbill
 *
 * @author Artur Wawrzynkiewicz <aw@appandweb.de>
 * @date 11.11.2015
 * @time 16:43
 */

namespace DVelopment\FastBill\Model\Response;

use DVelopment\FastBill\Model\Subscription;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("RESPONSE")
 */
class SubscriptionResponse extends Response
{
    /**
     * @var array
     *
     * @JMS\Type("array<DVelopment\FastBill\Model\Subscription>")
     * @JMS\SerializedName("SUBSCRIPTIONS")
     */
    private $subscriptions = array();

    /**
     * @return Subscription[]
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * @param array $subscriptions
     *
     * @return SubscriptionResponse
     */
    public function setSubscriptions(array $subscriptions)
    {
        $this->subscriptions = $subscriptions;

        return $this;
    }
}