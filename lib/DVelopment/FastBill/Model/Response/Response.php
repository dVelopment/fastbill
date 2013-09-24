<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 24.09.13
 * @time 19:23
 */

namespace DVelopment\FastBill\Model\Response;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("RESPONSE")
 */
class Response
{
    /**
     * @var array
     *
     * @JMS\SerializedName("ERRORS")
     * @JMS\Type("array<string, string>")
     */
    public $errors = array();

    /**
     * @var string
     *
     * @JMS\SerializedName("STATUS")
     * @JMS\Type("string")
     */
    public $status;

    /**
     * @var int
     *
     * @JMS\SerializedName("CUSTOMER_ID")
     * @JMS\Type("integer")
     */
    public $customerId;

    /**
     * @var int
     *
     * @JMS\SerializedName("PROJECT_ID")
     * @JMS\Type("integer")
     */
    public $projectId;

    /**
     * @var int
     *
     * @JMS\SerializedName("TIME_ID")
     * @JMS\Type("integer")
     */
    public $timeId;

    /**
     * @var int
     *
     * @JMS\SerializedName("ARTICLE_ID")
     * @JMS\Type("integer")
     */
    public $articleId;
}