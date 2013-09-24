<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 24.09.13
 * @time 19:31
 */

namespace DVelopment\FastBill\Model\Response;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("RESPONSE")
 */
class ArticleResponse extends Response
{
    /**
     * @var array
     *
     * @JMS\Type("array<DVelopment\FastBill\Model\Article>")
     * @JMS\SerializedName("ARTICLES")
     */
    private $articles = array();

    /**
     * @return array
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @param array $articles
     *
     * @return ArticleResponse
     */
    public function setArticles(array $articles)
    {
        $this->articles = $articles;

        return $this;
    }
}