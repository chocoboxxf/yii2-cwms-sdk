<?php
/**
 * 发票明细对象
 * User: chocoboxxf
 * Date: 2017/8/16
 */
namespace chocoboxxf\Cwms\Model\Order\Delivery;

use chocoboxxf\Cwms\Model\Base;

/**
 * 发票明细对象
 * @package chocoboxxf\Cwms\Model\Order\Delivery
 */
class Detail extends Base
{
    /**
     * @var Items 发票项目列表对象
     * 必填
     */
    public $items;
}