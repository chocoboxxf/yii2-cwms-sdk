<?php
/**
 * 解冻商品列表对象
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Inventory\UnFreeze;

use chocoboxxf\Cwms\Model\Base;

/**
 * 解冻商品列表对象
 * @package chocoboxxf\Cwms\Model\Inventory\UnFreeze
 */
class OrderLines extends Base
{
    /**
     * @var OrderLine[] 解冻商品对象,数组
     * 必填
     */
    public $orderLine;
}