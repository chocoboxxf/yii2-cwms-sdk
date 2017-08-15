<?php
/**
 * 入库单商品列表对象
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Order\Entry;

use chocoboxxf\Cwms\Model\Base;

/**
 * 入库单商品列表对象
 * @package chocoboxxf\Cwms\Model\Order\Entry
 */
class OrderLines extends Base
{
    /**
     * @var OrderLine[] 入库单商品对象，数组
     * 必填
     */
    public $orderLine;
}