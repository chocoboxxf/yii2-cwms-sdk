<?php
/**
 * 忽略XML空值节点
 * User: chocoboxxf
 * Date: 2017/8/17
 */
namespace chocoboxxf\Cwms\Util;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class IgnoreEmptyNodeNormalizer extends ObjectNormalizer
{
    /**
     * @param object $object
     * @param null $format
     * @param array $context
     * @return array|\Symfony\Component\Serializer\Normalizer\scalar
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = parent::normalize($object, $format, $context);

        return array_filter($data, function ($value) {
            return null !== $value;
        });
    }
}
