<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 24.09.13
 * @time 19:32
 */

namespace DVelopment\FastBill\Model;


use DVelopment\FastBill\Model\Response\ArticleResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("FBAPI")
 */
class ArticleFbApi
{
    /**
     * @var ArticleResponse
     *
     * @JMS\Type("DVelopment\FastBill\Model\Response\ArticleResponse")
     * @JMS\SerializedName("RESPONSE")
     */
    protected $response;

    /**
     * @return \DVelopment\FastBill\Model\Response\ArticleResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param \DVelopment\FastBill\Model\Response\ArticleResponse $response
     *
     * @return ArticleFbApi
     */
    public function setResponse(ArticleResponse $response)
    {
        $this->response = $response;

        return $this;
    }
}