<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 24.09.13
 * @time 18:49
 */

namespace DVelopment\FastBill\Model;


use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\ExclusionPolicy("none")
 */
class Task
{
    /**
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("TASK_ID")
     */
    private $taskId;

    /**
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("TASK_NUMBER")
     */
    private $taskNumber;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("TASK_NAME")
     */
    private $taskName;

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
     * @JMS\SerializedName("STATUS")
     */
    private $status;

    /**
     * @var float
     *
     * @JMS\Type("float")
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
     * @JMS\Type("float")
     * @JMS\SerializedName("VAT_PERCENT")
     */
    private $vatPercent;

    /**
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("PROJECT_ID")
     */
    private $projectId;

    /**
     * @return int
     */
    public function getTaskId()
    {
        return $this->taskId;
    }

    /**
     * @param int $taskId
     *
     * @return Task
     */
    public function setTaskId($taskId)
    {
        $this->taskId = $taskId;

        return $this;
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
     * @return Task
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * @param Project $project
     *
     * @return Task
     */
    public function setProject(Project $project)
    {
        return $this->setProjectId($project->getProjectId());
    }

    /**
     * @param string $currencyCode
     *
     * @return Task
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
     * @return Task
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
     * @param float $hourPrice
     *
     * @return Task
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
     * @param string $status
     *
     * @return Task
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
     * @param string $taskName
     *
     * @return Task
     */
    public function setTaskName($taskName)
    {
        $this->taskName = $taskName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaskName()
    {
        return $this->taskName;
    }

    /**
     * @param int $taskNumber
     *
     * @return Task
     */
    public function setTaskNumber($taskNumber)
    {
        $this->taskNumber = $taskNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getTaskNumber()
    {
        return $this->taskNumber;
    }

    /**
     * @param float $vatPercent
     *
     * @return Task
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
}