<?php
/**
 * 发票对象
 * User: chocoboxxf
 * Date: 2017/8/16
 */
namespace chocoboxxf\Cwms\Model\Order\Delivery;

use chocoboxxf\Cwms\Model\Base;

/**
 * 发票对象
 * @package chocoboxxf\Cwms\Model\Order\Delivery
 */
class Invoice extends Base
{
    /**
     * 发票类型枚举项
     */
    const TYPE_INVOICE = 'INVOICE'; // 普通发票
    const TYPE_VINVOICE = 'VINVOICE'; // 增值税普通发票
    const TYPE_EVINVOICE = 'EVINVOICE'; // 电子增票
    /**
     * @var string 发票类型
     * INVOICE=普通发票，VINVOICE=增值税普通发票, EVINVOICE=电子增票
     * 必填，最长50字
     */
    public $type;
    /**
     * @var string 发票抬头
     * 必填，最长200字
     */
    public $header;
    /**
     * @var double 发票总金额
     * double (18, 2)
     * 必填
     */
    public $amount;
    /**
     * @var string 发票内容
     * 最长500字
     */
    public $content;
    /**
     * @var Detail 发票明细对象
     * 当content和detail同时存在时，优先处理detail的信息
     */
    public $detail;
}