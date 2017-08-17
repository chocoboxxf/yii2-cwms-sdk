<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/7
 */
namespace chocoboxxf\Cwms\Model;

use chocoboxxf\Cwms\Util\IgnoreEmptyNodeNormalizer;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Serializer;
use yii\base\Object;

abstract class Base extends Object
{
    protected $rootNode = 'request'; // root节点，默认request

    protected $serializer;

    public function __construct(array $config = [])
    {
        parent::__construct($config);
        // 初始化XML生成器
        $encoders = [new XmlEncoder($this->rootNode)];
        // 未赋值字段在生成XML时过滤
        $normalizers = [new IgnoreEmptyNodeNormalizer(null, null, null, new ReflectionExtractor())];
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    public function toXML()
    {
        return $this->serializer->serialize($this, 'xml', [
            'xml_encoding' => 'utf-8',
        ]);
    }

    public static function newInstance($params = [])
    {
        $newObject = new static();
        foreach ($params as $key => $value) {
            if ($newObject->canSetProperty($key)) {
                $newObject->$key = $value;
            }
        }
        return $newObject;
    }
}