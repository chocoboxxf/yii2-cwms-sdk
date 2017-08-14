<?php
/**
 * 入库单创建接口请求对象
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Order\Entry;

use chocoboxxf\Cwms\Model\Base;

/**
 * 入库单创建接口请求对象
 * @package chocoboxxf\Cwms\Model\Order\Entry
 */
class Order extends Base
{
    /**
     * @var EntryOrder 入库单基本信息对象
     * 必填
     */
    public $entryOrder;
    /**
     * @var OrderLines 入库单商品列表对象
     * 必填
     */
    public $orderLines;
}