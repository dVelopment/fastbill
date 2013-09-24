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
    protected $errors = array();

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param mixed $errors
     *
     * @return Response
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;

        return $this;
    }
}