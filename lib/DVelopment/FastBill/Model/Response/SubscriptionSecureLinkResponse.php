<?php
/**
 * @package fastbill
 *
 * @author Artur Wawrzynkiewicz <aw@appandweb.de>
 * @date 12.11.2015
 * @time 13:32
 */

namespace DVelopment\FastBill\Model\Response;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\ExclusionPolicy("none")
 */
class SubscriptionSecureLinkResponse
{
    /**
     * @var array
     *
     * @JMS\SerializedName("ERRORS")
     * @JMS\Type("array<string, string>")
     */
    public $errors = array();

    /**
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("SUBSCRIPTION_ID")
     */
    private $subscriptionId;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("ADDONS_URL")
     */
    private $addonsUrl;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("CANCEL_URL")
     */
    private $cancelUrl;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("REACTIVATE_URL")
     */
    private $reactivateUrl;

    /**
     * @param int $subscriptionId
     *
     * @return Subscription
     */
    public function setSubscriptionId($subscriptionId)
    {
        $this->subscriptionId = $subscriptionId;
        return $this;
    }

    /**
     * @return int
     */
    public function getSubscriptionId()
    {
        return $this->subscriptionId;
    }

    /**
     * @param string $addonsUrl
     *
     * @return Subscription
     */
    public function setAddonsUrl($addonsUrl)
    {
        $this->addonsUrl = $addonsUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddonsUrl()
    {
        return $this->addonsUrl;
    }

    /**
     * @param string $cancelUrl
     *
     * @return Subscription
     */
    public function setCancelUrl($cancelUrl)
    {
        $this->cancelUrl = $cancelUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getCancelUrl()
    {
        return $this->cancelUrl;
    }

    /**
     * @param string $reactivateUrl
     *
     * @return Subscription
     */
    public function setReactivateUrl($reactivateUrl)
    {
        $this->reactivateUrl = $reactivateUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getReactivateUrl()
    {
        return $this->reactivateUrl;
    }
}