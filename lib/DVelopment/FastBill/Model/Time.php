<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 20:35
 */

namespace DVelopment\FastBill\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\ExclusionPolicy("none")
 */
class Time
{
    /**
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("TIME_ID")
     */
    private $timeId;

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
     * @JMS\SerializedName("PROJECT_ID")
     */
    private $projectId;

    /**
     * @var \DateTime
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("DATE")
     */
    private $date;

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
     * @JMS\SerializedName("ARTICLE_NUMBER")
     */
    private $articleNumber;

    /**
     * @var \DateTime
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("START_TIME")
     */
    private $startTime;

    /**
     * @var \DateTime
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("END_TIME")
     */
    private $endTime;

    /**
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("MINUTES")
     */
    private $minutes;

    /**
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("BILLABLE_MINUTES")
     */
    private $billableMinutes;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("COMMENT")
     */
    private $comment;

    /**
     * @param int $billableMinutes
     *
     * @return Time
     */
    public function setBillableMinutes($billableMinutes)
    {
        $this->billableMinutes = $billableMinutes;
        return $this;
    }

    /**
     * @return int
     */
    public function getBillableMinutes()
    {
        return $this->billableMinutes;
    }

    /**
     * @param mixed $comment
     *
     * @return Time
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param int $customerId
     *
     * @return Time
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
     * @param \DateTime $date
     *
     * @return Time
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $endTime
     *
     * @return Time
     */
    public function setEndTime(\DateTime $endTime)
    {
        $this->endTime = $endTime;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param int $minutes
     *
     * @return Time
     */
    public function setMinutes($minutes)
    {
        $this->minutes = $minutes;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinutes()
    {
        return $this->minutes;
    }

    /**
     * @param int $projectId
     *
     * @return Time
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
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
     * @param \DateTime $startTime
     *
     * @return Time
     */
    public function setStartTime(\DateTime $startTime)
    {
        $this->startTime = $startTime;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param int $taskId
     *
     * @return Time
     */
    public function setTaskId($taskId)
    {
        $this->taskId = $taskId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTaskId()
    {
        return $this->taskId;
    }

    /**
     * @param int $timeId
     *
     * @return Time
     */
    public function setTimeId($timeId)
    {
        $this->timeId = $timeId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimeId()
    {
        return $this->timeId;
    }

    /**
     * @param Customer $customer
     *
     * return Time
     */
    public function setCustomer(Customer $customer)
    {
        $this->setCustomerId($customer->getCustomerId());

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
     * @param int $articleNumber
     *
     * @return Time
     */
    public function setArticleNumber($articleNumber)
    {
        $this->articleNumber = $articleNumber;

        return $this;
    }
}