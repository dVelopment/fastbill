<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 22:16
 */

namespace DVelopment\FastBill\Model\Response;

use DVelopment\FastBill\Model\Project;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("RESPONSE")
 */
class ProjectResponse extends Response
{
    /**
     * @var array
     *
     * @JMS\Type("array<DVelopment\FastBill\Model\Project>")
     * @JMS\SerializedName("PROJECTS")
     */
    private $projects = array();

    /**
     * @return Project[]
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * @param array $projects
     *
     * @return ProjectResponse
     */
    public function setProjects(array $projects)
    {
        $this->projects = $projects;

        return $this;
    }
}