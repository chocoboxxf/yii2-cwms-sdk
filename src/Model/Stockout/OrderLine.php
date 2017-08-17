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
     * 库存类型枚举项
     */
    const INVENTORY_TYPE_ZP = 'ZP'; // 正品
    const INVENTORY_TYPE_CC = 'CC'; // 残次
    const INVENTORY_TYPE_JS = 'JS'; // 机损
    const INVENTORY_TYPE_XS = 'XS'; // 箱损
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
     * @var string 仓储系统商品编码
     * 最长50字
     */
    public $itemId;
    /**
     * @var string 商品名称
     * 最长200字
     */
    public $itemName;
    /**
     * @var string 库存类型
     * ZP=正品, CC=残次,JS=机损, XS= 箱损，默认为ZP
     * 最长50字
     */
    public $inventoryType;
    /**
     * @var integer 应发商品数量
     * 必填
     */
    public $planQty;
    /**
     * @var string 批次编码
     * 最长50字
     */
    public $batchCode;
    /**
     * @var string 生产日期
     * YYYY-MM-DD
     * 最长10字
     */
    public $productDate;
    /**
     * @var string 过期日期
     * YYYY-MM-DD
     * 最长10字
     */
    public $expireDate;
    /**
     * @var string 生产批号
     * 最长50字
     */
    public $produceCode;
}