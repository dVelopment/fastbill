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
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("ARTICLE_ID")
     */
    private $articleId;

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
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("UNIT")
     */
    private $unit;

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
     * @param string $unit
     *
     * @return Article
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
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
     * @return int
     */
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * @param int $articleId
     *
     * @return Article
     */
    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;

        return $this;
    }
}