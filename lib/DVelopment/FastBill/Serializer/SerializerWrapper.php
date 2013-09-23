<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 21:00
 */

namespace DVelopment\FastBill\Serializer;


use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class SerializerWrapper implements SerializerInterface
{
    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * Deserializes data into the given type.
     *
     * @param mixed $data
     * @param string $type
     * @param string $format
     * @param array $context
     *
     * @return object
     */
    public function deserialize($data, $type, $format, array $context = array())
    {
        return $this->serializer->deserialize($data, $type, $format);
    }

    /**
     * Serializes data in the appropriate format
     *
     * @param mixed $data    any data
     * @param string $format  format name
     * @param array $context options normalizers/encoders have access to
     *
     * @return string
     */
    public function serialize($data, $format, array $context = array())
    {
        return $this->serializer->serialize($data, $format, $context);
    }
}