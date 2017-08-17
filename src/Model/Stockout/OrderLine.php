<?php
/**
 * 出库单商品对象
 * User: chocoboxxf
 * Date: 2017/8/17
 */
namespace chocoboxxf\Cwms\Model\Stockout;

use chocoboxxf\Cwms\Model\Base;

/**
 * 出库单商品对象
 * @package chocoboxxf\Cwms\Model\Stockout
 */
class OrderLine extends Base
{
    /**
     * @var string 外部业务编码, 消息ID, 用于去重，当单据需要分批次发送时使用
     * 最长50字
     */
    public $outBizCode;
    /**
     * @var string 入库单的行号，用来去重
     * 最长50字
     */
    public $orderLineNo;
    /**
     * @var string 货主编码
     * 必填，最长50字
     */
    public $ownerCode;
    /**
     * @var string 商品编码
     * 必填，最长50字
     */
    public $itemCode;
    /**
     * @var integer 应发商品数量
     * 必填
     */
    public $planQty;
}