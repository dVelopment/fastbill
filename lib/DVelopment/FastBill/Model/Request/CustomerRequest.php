<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 21:49
 */

namespace DVelopment\FastBill\Model\Request;


use DVelopment\FastBill\Model\Customer;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("FBAPI")
 */
class CustomerRequest extends Request
{
    /**
     * @var Customer
     *
     * @JMS\SerializedName("DATA")
     * @JMS\Type("DVelopment\FastBill\Model\Customer")
     */
    protected $data;

    /**
     * @param $service
     * @param array $filter
     * @param Customer $customer
     */
    public function __construct($service, array $filter = array(), Customer $customer = null)
    {
        parent::__construct($service, $filter);
        $this->data = $customer;
    }

    /**
     * @return \DVelopment\FastBill\Model\Customer
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \DVelopment\FastBill\Model\Customer $data
     *
     * @return CustomerRequest
     */
    public function setData(Customer $data)
    {
        $this->data = $data;

        return $this;
    }
}