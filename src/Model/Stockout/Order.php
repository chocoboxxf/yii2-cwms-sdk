<?php
/**
 * 出库单创建接口请求对象
 * User: chocoboxxf
 * Date: 2017/8/17
 */
namespace chocoboxxf\Cwms\Model\Stockout;

use chocoboxxf\Cwms\Model\Base;

/**
 * 出库单创建接口请求对象
 * @package chocoboxxf\Cwms\Model\Stockout
 */
class Order extends Base
{
    /**
     * @var DeliveryOrder 出库单基本信息对象
     * 必填
     */
    public $deliveryOrder;
    /**
     * @var OrderLines 出库单商品列表对象
     * 必填
     */
    public $orderLines;
}