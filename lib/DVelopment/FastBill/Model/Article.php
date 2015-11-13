<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 24.09.13
 * @time 19:18
 */

namespace DVelopment\FastBill\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\ExclusionPolicy("none")
 */
class Article
{
    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("ARTICLE_NUMBER")
     */
    private $articleNumber;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("TITLE")
     */
    private $title;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("DESCRIPTION")
     */
    private $description;

    /**
     * @var float
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("UNIT_PRICE")
     */
    private $unitPrice;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("SETUP_FEE ")
     */
    private $setupFee;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("CURRENCY_CODE")
     */
    private $currencyCode;

    /**
     * @var float
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("VAT_PERCENT")
     */
    private $vatPercent;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("TRANSLATION")
     */
    private $translation;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("SUBSCRIPTION_INTERVAL")
     */
    private $subscriptionInterval;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("SUBSCRIPTION_TRIAL")
     */
    private $subscriptionTrial;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("SUBSCRIPTION_DURATION")
     */
    private $subscriptionDuration;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("SUBSCRIPTION_DURATION_FOLLOW")
     */
    private $subscriptionDurationFollow;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("SUBSCRIPTION_CANCELLATION")
     */
    private $subscriptionCancellation;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("CHECKOUT_URL")
     */
    private $checkoutUrl;

    /**
     * @param int $articleNumber
     *
     * @return Article
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
     * @param string $currencyCode
     *
     * @return Article
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param string $description
     *
     * @return Article
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $title
     *
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param float $unitPrice
     *
     * @return Article
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param string $setupFee
     *
     * @return Article
     */
    public function setSetupFee($setupFee)
    {
        $this->setupFee = $setupFee;
        return $this;
    }

    /**
     * @return string
     */
    public function getSetupFee()
    {
        return $this->setupFee;
    }

    /**
     * @param float $vatPercent
     *
     * @return Article
     */
    public function setVatPercent($vatPercent)
    {
        $this->vatPercent = $vatPercent;
        return $this;
    }

    /**
     * @return float
     */
    public function getVatPercent()
    {
        return $this->vatPercent;
    }

    /**
     * @param string $translation
     *
     * @return Article
     */
    public function setTranslation($translation)
    {
        $this->translation = $translation;
        return $this;
    }

    /**
     * @return string
     */
    public function getTranslation()
    {
        return $this->translation;
    }

    /**
     * @param string $subscriptionInterval
     *
     * @return Article
     */
    public function setSubscriptionInterval($subscriptionInterval)
    {
        $this->subscriptionInterval = $subscriptionInterval;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubscriptionInterval()
    {
        return $this->subscriptionInterval;
    }

    /**
     * @param string $subscriptionTrial
     *
     * @return Article
     */
    public function setSubscriptionTrial($subscriptionTrial)
    {
        $this->subscriptionTrial = $subscriptionTrial;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubscriptionTrial()
    {
        return $this->subscriptionTrial;
    }

    /**
     * @param string $subscriptionDuration
     *
     * @return Article
     */
    public function setSubscriptionDuration($subscriptionDuration)
    {
        $this->subscriptionDuration = $subscriptionDuration;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubscriptionDuration()
    {
        return $this->subscriptionDuration;
    }

    /**
     * @param string $subscriptionDurationFollow
     *
     * @return Article
     */
    public function setSubscriptionDurationFollow($subscriptionDurationFollow)
    {
        $this->subscriptionDurationFollow = $subscriptionDurationFollow;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubscriptionDurationFollow()
    {
        return $this->subscriptionDurationFollow;
    }

    /**
     * @param string $subscriptionCancellation
     *
     * @return Article
     */
    public function setSubscriptionCancellation($subscriptionCancellation)
    {
        $this->subscriptionCancellation = $subscriptionCancellation;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubscriptionCancellation()
    {
        return $this->subscriptionCancellation;
    }

    /**
     * @return string
     */
    public function getCheckoutUrl()
    {
        return $this->checkoutUrl;
    }

    /**
     * @param string $checkoutUrl
     *
     * @return Article
     */
    public function setCheckoutUrl($checkoutUrl)
    {
        $this->checkoutUrl = $checkoutUrl;

        return $this;
    }
}