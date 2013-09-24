<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 24.09.13
 * @time 19:26
 */

namespace DVelopment\FastBill\Exception;


use Exception;

class FastBillException extends \RuntimeException
{
    /**
     * @var array
     */
    private $errors = array();

    public function __construct(array $errors = array())
    {
        parent::__construct(implode('; ', $errors));
        $this->errors = $errors;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}