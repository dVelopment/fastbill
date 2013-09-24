<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 21:29
 */

namespace DVelopment\FastBill\Model;

use DVelopment\FastBill\Model\Request\Request;
use DVelopment\FastBill\Model\Response\Response;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("FBAPI")
 */
class FbApi
{
    /**
     * @var Request
     *
     * @JMS\Type("DVelopment\FastBill\Model\Request\Request")
     * @JMS\SerializedName("REQUEST")
     */
    protected $request;

    /**
     * @var array
     *
     * @JMS\Type("DVelopment\FastBill\Model\Response\Response")
     * @JMS\SerializedName("RESPONSE")
     */
    private $response = array();

    /**
     * @return \DVelopment\FastBill\Model\Request\Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param \DVelopment\FastBill\Model\Request\Request $request
     *
     * @return FbApi
     */
    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @return \DVelopment\FastBill\Model\Response\Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param \DVelopment\FastBill\Model\Response\Response $response
     *
     * @return FbApi
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;

        return $this;
    }
}