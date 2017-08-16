<?php
/**
 * 保险信息对象
 * User: chocoboxxf
 * Date: 2017/8/16
 */
namespace chocoboxxf\Cwms\Model\Order\Delivery;

use chocoboxxf\Cwms\Model\Base;

/**
 * 保险信息对象
 * @package chocoboxxf\Cwms\Model\Order\Delivery
 */
class Insurance extends Base
{
    /**
     * @var string 保险类型
     * 必填，最长50字
     */
    public $type;
    /**
     * @var double 保险金额
     * double (18, 2)
     * 必填
     */
    public $amount;
}