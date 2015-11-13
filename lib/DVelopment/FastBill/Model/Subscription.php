<?php
/**
 * @package fastbill
 *
 * @author Artur Wawrzynkiewicz <aw@appandweb.de>
 * @date 11.11.2015
 * @time 13:03
 */

namespace DVelopment\FastBill\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\ExclusionPolicy("none")
 */
class Subscription
{
    /**
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("SUBSCRIPTION_ID")
     */
    private $subscriptionId;

    /**
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("CUSTOMER_ID")
     */
    private $customerId;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("SUBSCRIPTION_TITLE")
     */
    private $subscriptionTitle;

    /**
     * @var datetime
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("START")
     */
    private $start;

    /**
     * @var datetime
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("NEXT_EVENT")
     */
    private $nextEvent;

    /**
     * @var datetime
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("CANCELLATION_DATE")
     */
    private $cancelationDate;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("STATUS")
     */
    private $status;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("HASH")
     */
    private $hash;

    /**
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("ARTICLE_NUMBER")
     */
    private $articleNumber;
    
    /**
     * @var string
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("QUANTITY")
     */
    private $quantity;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("SUBSCRIPTION_EXT_UID")
     */
    private $subscriptionExtUid;

    /**
     * @var datetime
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("LAST_EVENT")
     */
    private $lastEvent;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("CANCELLATION_NOTE")
     */
    private $cancelationNote;

    /**
     * @var datetime
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("EXPIRATION_DATE")
     */
    private $expirationDate;

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
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     *
     * @return Subscription
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * @param string $subscriptionTitle
     *
     * @return Subscription
     */
    public function setSubscriptionTitle($subscriptionTitle)
    {
        $this->subscriptionTitle = $subscriptionTitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubscriptionTitle()
    {
        return $this->subscriptionTitle;
    }

    /**
     * @param string $start
     *
     * @return Subscription
     */
    public function setStart($start)
    {
        $this->start = $start;
        return $this;
    }

    /**
     * @return datetime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param string $nextEvent
     *
     * @return Subscription
     */
    public function setNextEvent($nextEvent)
    {
        $this->nextEvent = $nextEvent;
        return $this;
    }

    /**
     * @return datetime
     */
    public function getNextEvent()
    {
        return $this->nextEvent;
    }
    
    /**
     * @param string $cancelationDate
     *
     * @return Subscription
     */
    public function setCancelationDate($cancelationDate)
    {
        $this->cancelationDate = $cancelationDate;
        return $this;
    }

    /**
     * @return datetime
     */
    public function getCancelationDate()
    {
        return $this->cancelationDate;
    }

    /**
     * @param string $status
     *
     * @return Subscription
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $hash
     *
     * @return Subscription
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param int $articleNumber
     *
     * @return Subscription
     */
    public function setArticleNumber($articleNumber)
    {
        $this->articleNumber = $articleNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getArticleNumber()
    {
        return $this->articleNumber;
    }

    /**
     * @param int $quantity
     *
     * @return Subscription
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
    
    /**
     * @param string $subscriptionExtUid
     *
     * @return Subscription
     */
    public function setSubscriptionExtUid($subscriptionExtUid)
    {
        $this->subscriptionExtUid = $subscriptionExtUid;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubscriptionExtUid()
    {
        return $this->subscriptionExtUid;
    }
    
    /**
     * @param string $lastEvent
     *
     * @return Subscription
     */
    public function setLastEvent($lastEvent)
    {
        $this->lastEvent = $lastEvent;
        return $this;
    }

    /**
     * @return datetime
     */
    public function getLastEvent()
    {
        return $this->lastEvent;
    }

    /**
     * @param string $cancelatioNote
     *
     * @return Subscription
     */
    public function setCancelatioNote($cancelatioNote)
    {
        $this->cancelatioNote = $cancelatioNote;
        return $this;
    }

    /**
     * @return string
     */
    public function getCancelatioNote()
    {
        return $this->cancelatioNote;
    }

    /**
     * @param string $expirationDate
     *
     * @return Subscription
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    /**
     * @return datetime
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }
}