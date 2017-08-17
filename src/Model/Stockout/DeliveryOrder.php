<?php
/**
 * 出库单基本信息对象
 * User: chocoboxxf
 * Date: 2017/8/17
 */
namespace chocoboxxf\Cwms\Model\Stockout;

use chocoboxxf\Cwms\Model\Base;

/**
 * 出库单基本信息对象
 * @package chocoboxxf\Cwms\Model\Stockout
 */
class DeliveryOrder extends Base
{
    /**
     * 出库单类型枚举项
     */
    const ORDER_TYPE_PTCK = 'PTCK'; // 普通出库单（退仓）
    const ORDER_TYPE_DBCK = 'DBCK'; // 调拨出库
    const ORDER_TYPE_B2BCK = 'B2BCK'; // B2B出库
    const ORDER_TYPE_QTCK = 'QTCK'; // 其他出库
    const ORDER_TYPE_CGTH = 'CGTH'; // 采购退货出库单
    /**
     * @var integer 单据总行数
     */
    public $totalOrderLines;
    /**
     * @var string 出库单号（ERP分配）
     * 必填，最长50字
     */
    public $deliveryOrderCode;
    /**
     * @var string 出库单类型
     * PTCK=普通出库单（退仓），DBCK=调拨出库 ，B2BCK=B2B出库，QTCK=其他出库，CGTH=采购退货出库单
     * 必填，最长50字
     */
    public $orderType;
    /**
     * @var string 仓库编码
     * 必填，最长50字
     */
    public $warehouseCode;
    /**
     * @var string 出库单创建时间
     * YYYY-MM-DD HH:MM:SS
     * 必填，最长19字
     */
    public $createTime;
    /**
     * @var ReceiverInfo 收件人信息对象
     * 必填
     */
    public $receiverInfo;
}