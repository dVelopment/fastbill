<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 24.09.13
 * @time 20:05
 */

namespace DVelopment\FastBill\Model\Request;


use DVelopment\FastBill\Model\Article;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("FBAPI")
 */
class ArticleRequest extends Request
{
    /**
     * @var Article
     *
     * @JMS\SerializedName("DATA")
     * @JMS\Type("DVelopment\FastBill\Model\Article")
     */
    protected $data;

    /**
     * @param string $service
     * @param array $filter
     * @param Article $article
     */
    public function __construct($service, array $filter = array(), Article $article = null)
    {
        parent::__construct($service, $filter);
        $this->data = $article;
    }

    /**
     * @return \DVelopment\FastBill\Model\Article
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \DVelopment\FastBill\Model\Article $data
     *
     * @return ArticleRequest
     */
    public function setData(Article $data)
    {
        $this->data = $data;

        return $this;
    }
}