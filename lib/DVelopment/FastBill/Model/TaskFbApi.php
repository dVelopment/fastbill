<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 01.08.14
 * @time 10:16
 */

namespace DVelopment\FastBill\Model;


use DVelopment\FastBill\Model\Response\Response;
use DVelopment\FastBill\Model\Response\TaskResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("FBAPI")
 */
class TaskFbApi extends FbApi
{
    /**
     * @var TaskResponse
     *
     * @JMS\Type("DVelopment\FastBill\Model\Response\TaskResponse")
     * @JMS\SerializedName("RESPONSE")
     */
    protected $response;

    /**
     * @return \DVelopment\FastBill\Model\Response\TaskResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param \DVelopment\FastBill\Model\Response\TaskResponse $response
     *
     * @return TimeFbApi
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;

        return $this;
    }
} 