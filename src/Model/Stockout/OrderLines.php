<?php
/**
 * 出库单商品列表对象
 * User: chocoboxxf
 * Date: 2017/8/17
 */
namespace chocoboxxf\Cwms\Model\Stockout;

use chocoboxxf\Cwms\Model\Base;

/**
 * 出库单商品列表对象
 * @package chocoboxxf\Cwms\Model\Stockout
 */
class OrderLines extends Base
{
    /**
     * @var OrderLine[] 出库单商品对象，数组
     * 必填
     */
    public $orderLine;
}