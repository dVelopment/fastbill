<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 21:34
 */

namespace DVelopment\FastBill\Model\Response;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("RESPONSE")
 */
class CustomerResponse extends Response
{
    /**
     * @var array
     *
     * @JMS\Type("array<DVelopment\FastBill\Model\Customer>")
     * @JMS\SerializedName("CUSTOMERS")
     */
    private $customers = array();

    /**
     * @return array
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * @param array $customers
     *
     * @return CustomerResponse
     */
    public function setCustomers(array $customers)
    {
        $this->customers = $customers;

        return $this;
    }
}