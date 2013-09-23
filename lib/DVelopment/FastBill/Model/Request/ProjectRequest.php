<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 21:58
 */

namespace DVelopment\FastBill\Model\Request;


use DVelopment\FastBill\Model\Project;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("FBAPI")
 */
class ProjectRequest extends Request
{
    /**
     * @var Project
     *
     * @JMS\SerializedName("DATA")
     * @JMS\Type("DVelopment\FastBill\Model\Project")
     */
    protected $data;

    /**
     * @param string $service
     * @param array $filter
     * @param Project $project
     */
    public function __construct($service, array $filter = array(), Project $project = null)
    {
        parent::__construct($service, $filter);
        $this->data = $project;
    }

    /**
     * @return \DVelopment\FastBill\Model\Project
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \DVelopment\FastBill\Model\Project $data
     *
     * @return ProjectRequest
     */
    public function setData(Project $data)
    {
        $this->data = $data;

        return $this;
    }
}