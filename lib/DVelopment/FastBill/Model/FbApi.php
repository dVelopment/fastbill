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
     * @JMS\Type("array<string, string>")
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
     * @return array
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param array $response
     *
     * @return FbApi
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }
}