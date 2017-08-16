<?php
/**
 * 发票列表对象
 * User: chocoboxxf
 * Date: 2017/8/16
 */
namespace chocoboxxf\Cwms\Model\Order\Delivery;

use chocoboxxf\Cwms\Model\Base;

/**
 * 发票列表对象
 * @package chocoboxxf\Cwms\Model\Order\Delivery
 */
class Invoices extends Base
{
    /**
     * @var Invoice[] 发票对象，数组
     * 必填
     */
    public $invoice;
}