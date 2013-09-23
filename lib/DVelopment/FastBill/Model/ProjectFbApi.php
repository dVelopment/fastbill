<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 22:16
 */

namespace DVelopment\FastBill\Model;

use DVelopment\FastBill\Model\Response\ProjectResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("FBAPI")
 */
class ProjectFbApi extends FbApi
{
    /**
     * @var ProjectResponse
     *
     * @JMS\Type("DVelopment\FastBill\Model\Response\ProjectResponse")
     * @JMS\SerializedName("RESPONSE")
     */
    protected $response;

    /**
     * @return \DVelopment\FastBill\Model\Response\ProjectResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param \DVelopment\FastBill\Model\Response\ProjectResponse $response
     *
     * @return ProjectFbApi
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }
}