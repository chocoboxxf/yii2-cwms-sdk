<?php
/**
 * 发货单创建接口请求对象
 * User: chocoboxxf
 * Date: 2017/8/15
 */
namespace chocoboxxf\Cwms\Model\Order\Delivery;

use chocoboxxf\Cwms\Model\Base;

/**
 * 发货单创建接口请求对象
 * @package chocoboxxf\Cwms\Model\Order\Delivery
 */
class Order extends Base
{
    /**
     * @var DeliveryOrder 发货单基本信息对象
     * 必填
     */
    public $deliveryOrder;
    /**
     * @var OrderLines 发货单商品列表对象
     * 必填
     */
    public $orderLines;
}