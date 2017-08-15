<?php
/**
 * 冻结商品列表对象
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Inventory\Freeze;

use chocoboxxf\Cwms\Model\Base;

/**
 * 冻结商品列表对象
 * @package chocoboxxf\Cwms\Model\Inventory\Freeze
 */
class OrderLines extends Base
{
    /**
     * @var OrderLine[] 冻结商品对象,数组
     * 必填
     */
    public $orderLine;
}