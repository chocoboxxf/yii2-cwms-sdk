<?php
/**
 * 发货单商品列表对象
 * User: chocoboxxf
 * Date: 2017/8/15
 */
namespace chocoboxxf\Cwms\Model\Order\Delivery;

use chocoboxxf\Cwms\Model\Base;

/**
 * 发货单商品列表对象
 * @package chocoboxxf\Cwms\Model\Order\Delivery
 */
class OrderLines extends Base
{
    /**
     * @var OrderLine[] 发货单商品对象，数组
     * 必填
     */
    public $orderLine;
}