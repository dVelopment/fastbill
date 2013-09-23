<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 20:20
 */

namespace DVelopment\FastBill\Model;


use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\ExclusionPolicy("none")
 */
class Project
{
    /**
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("PROJECT_ID")
     */
    private $projectId;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("PROJECT_NAME")
     */
    private $projectName;

    /**
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("CUSTOMER_ID")
     */
    private $customerId;

    /**
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("CUSTOMER_COST_CENTER_ID")
     */
    private $customerCostCenterId;

    /**
     * @var float
     *
     * @JMS\Type("double")
     * @JMS\SerializedName("HOUR_PRICE")
     */
    private $hourPrice;

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
     * @JMS\Type("double")
     * @JMS\SerializedName("VAT_PERCENT")
     */
    private $vatPercent;

    /**
     * @var \DateTime
     *
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("START_DATE")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("END_DATE")
     */
    private $endDate;

    /**
     * @param string $currencyCode
     *
     * @return Project
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
     * @param int $customerCostCenterId
     *
     * @return Project
     */
    public function setCustomerCostCenterId($customerCostCenterId)
    {
        $this->customerCostCenterId = $customerCostCenterId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCustomerCostCenterId()
    {
        return $this->customerCostCenterId;
    }

    /**
     * @param int $customerId
     *
     * @return Project
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param \DateTime $endDate
     *
     * @return Project
     */
    public function setEndDate(\DateTime $endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param float $hourPrice
     *
     * @return Project
     */
    public function setHourPrice($hourPrice)
    {
        $this->hourPrice = $hourPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getHourPrice()
    {
        return $this->hourPrice;
    }

    /**
     * @param string $projectName
     *
     * @return Project
     */
    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;
        return $this;
    }

    /**
     * @return string
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * @param \DateTime $startDate
     *
     * @return Project
     */
    public function setStartDate(\DateTime $startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param float $vatPercent
     *
     * @return Project
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
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     *
     * @return Project
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * @param Customer $customer
     *
     * @return Project
     */
    public function setCustomer(Customer $customer)
    {
        $this->setCustomerId($customer->getCustomerId());

        return $this;
    }
}