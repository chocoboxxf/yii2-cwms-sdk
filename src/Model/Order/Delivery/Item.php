<?php
/**
 * 发票项目对象
 * User: chocoboxxf
 * Date: 2017/8/16
 */
namespace chocoboxxf\Cwms\Model\Order\Delivery;

use chocoboxxf\Cwms\Model\Base;

/**
 * 发票项目对象
 * @package chocoboxxf\Cwms\Model\Order\Delivery
 */
class Item extends Base
{
    /**
     * @var string 商品名称
     * 必填，最长50字
     */
    public $itemName;
    /**
     * @var string 商品单位
     * 必填，最长50字
     */
    public $unit;
    /**
     * @var double 商品单价
     * double (18, 2)
     * 必填
     */
    public $price;
    /**
     * @var integer 数量
     * 必填
     */
    public $quantity;
    /**
     * @var double 金额
     * double (18, 2)
     * 必填
     */
    public $amount;
}