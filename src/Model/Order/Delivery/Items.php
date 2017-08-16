<?php
/**
 * 发票项目列表对象
 * User: chocoboxxf
 * Date: 2017/8/16
 */
namespace chocoboxxf\Cwms\Model\Order\Delivery;

use chocoboxxf\Cwms\Model\Base;

/**
 * 发票项目列表对象
 * @package chocoboxxf\Cwms\Model\Order\Delivery
 */
class Items extends Base
{
    /**
     * @var Item[] 发票项目对象，数组
     * 必填
     */
    public $item;
}