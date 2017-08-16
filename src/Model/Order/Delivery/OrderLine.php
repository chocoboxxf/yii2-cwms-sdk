<?php
/**
 * 发货单商品对象
 * User: chocoboxxf
 * Date: 2017/8/15
 */
namespace chocoboxxf\Cwms\Model\Order\Delivery;

use chocoboxxf\Cwms\Model\Base;

/**
 * 发货单商品对象
 * @package chocoboxxf\Cwms\Model\Order\Delivery
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
    const INVENTORY_TYPE_ZT = 'ZT'; // 在途库存
    /**
     * @var string 单据行号
     * 最长50字
     */
    public $orderLineNo;
    /**
     * @var string 交易平台订单
     * 最长50字
     */
    public $sourceOrderCode;
    /**
     * @var string 交易平台子订单编码
     * 最长50字
     */
    public $subSourceOrderCode;
    /**
     * @var string 支付平台交易号
     * 淘系订单传支付宝交易号
     * 最长50字
     */
    public $payNo;
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
     * @var string 库存类型
     * ZP=正品, CC=残次,JS=机损, XS= 箱损, ZT=在途库存，默认为查所有类型的库存
     * 最长50字
     */
    public $inventoryType;
    /**
     * @var string 商品名称
     * 最长200字
     */
    public $itemName;
    /**
     * @var string 交易平台商品编码
     * 最长50字
     */
    public $extCode;
    /**
     * @var integer 应发商品数量
     * 必填
     */
    public $planQty;
    /**
     * @var double 零售价
     * 零售价=实际成交价+单件商品折扣金额
     * double(18, 2)
     */
    public $retailPrice;
    /**
     * @var double 实际成交价
     * double(18, 2)
     */
    public $actualPrice;
    /**
     * @var double 单件商品折扣金额
     * double(18, 2)
     */
    public $discountAmount;
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
}