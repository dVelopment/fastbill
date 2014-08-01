<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 01.08.14
 * @time 10:18
 */

namespace DVelopment\FastBill\Model\Response;

use DVelopment\FastBill\Model\Task;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("RESPONSE")
 */
class TaskResponse extends Response
{
    /**
     * @var array
     *
     * @JMS\Type("array<DVelopment\FastBill\Model\Task>")
     * @JMS\SerializedName("TASKS")
     */
    private $tasks = array();

    /**
     * @return Task[]
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @param array $tasks
     *
     * @return TaskResponse
     */
    public function setTasks(array $tasks)
    {
        $this->tasks = $tasks;

        return $this;
    }
}