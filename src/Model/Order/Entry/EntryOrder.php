<?php
/**
 * 入库单基本信息对象
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Order\Entry;

use chocoboxxf\Cwms\Model\Base;

/**
 * 入库单基本信息对象
 * @package chocoboxxf\Cwms\Model\Order\Entry
 */
class EntryOrder extends Base
{
    /**
     * 业务类型枚举项
     */
    const ORDER_TYPE_SCRK = 'SCRK'; // 生产入库
    const ORDER_TYPE_LYRK = 'LYRK'; // 领用入库
    const ORDER_TYPE_CCRK = 'CCRK'; // 残次品入库
    const ORDER_TYPE_CGRK = 'CGRK'; // 采购入库
    const ORDER_TYPE_DBRK = 'DBRK'; // 调拨入库
    const ORDER_TYPE_QTRK = 'QTRK'; // 其他入库
    const ORDER_TYPE_B2BRK = 'B2BRK'; // B2B入库
    /**
     * 物流公司编码枚举项
     */
    const LOGISTICS_CODE_SF = 'SF'; // 顺丰
    const LOGISTICS_CODE_EMS = 'EMS'; // 标准快递
    const LOGISTICS_CODE_EYB = 'EYB'; // 经济快件
    const LOGISTICS_CODE_ZJS = 'ZJS'; // 宅急送
    const LOGISTICS_CODE_YTO = 'YTO'; // 圆通
    const LOGISTICS_CODE_ZTO = 'ZTO'; // 中通
    const LOGISTICS_CODE_HTKY = 'HTKY'; // 百世汇通
    const LOGISTICS_CODE_UC = 'UC'; // 优速
    const LOGISTICS_CODE_STO = 'STO'; // 申通
    const LOGISTICS_CODE_TTKDEX = 'TTKDEX'; // 天天快递
    const LOGISTICS_CODE_QFKD = 'QFKD'; // 全峰
    const LOGISTICS_CODE_FAST = 'FAST'; // 快捷
    const LOGISTICS_CODE_POSTB = 'POSTB'; // 邮政小包
    const LOGISTICS_CODE_GTO = 'GTO'; // 国通
    const LOGISTICS_CODE_YUNDA = 'YUNDA'; // 韵达
    const LOGISTICS_CODE_JD = 'JD'; // 京东配送
    const LOGISTICS_CODE_DD = 'DD'; // 当当宅配
    const LOGISTICS_CODE_OTHER = 'OTHER'; // 其他
    /**
     * @var integer 单据总行数
     */
    public $totalOrderLines;
    /**
     * @var string 入库单号
     * 必填，最长50字
     */
    public $entryOrderCode;
    /**
     * @var string 货主编码
     * 必填，最长50字
     */
    public $ownerCode;
    /**
     * @var string 采购单号，仅当orderType为CGRK时使用
     * 最长50字
     */
    public $purchaseOrderCode;
    /**
     * @var string 仓库编码
     * 必填，最长50字
     */
    public $warehouseCode;
    /**
     * @var string 订单创建时间
     * YYYY-MM-DD HH:MM:SS
     * 最长19字
     */
    public $orderCreateTime;
    /**
     * @var string 业务类型
     * SCRK=生产入库，LYRK=领用入库，CCRK=残次品入库，CGRK=采购入库，DBRK=调拨入库, QTRK=其他入库，B2BRK=B2B入库
     * 最长50字
     */
    public $orderType;
    /**
     * @var string 预期到货时间
     * YYYY-MM-DD HH:MM:SS
     * 最长19字
     */
    public $expectStartTime;
    /**
     * @var string 最迟预期到货时间
     * YYYY-MM-DD HH:MM:SS
     * 最长19字
     */
    public $expectEndTime;
    /**
     * @var string 物流公司编码
     * SF=顺丰、EMS=标准快递、EYB=经济快件、ZJS=宅急送、YTO=圆通  、ZTO=中通 (ZTO) 、HTKY=百世汇通、
     * UC=优速、STO=申通、TTKDEX=天天快递  、QFKD=全峰、FAST=快捷、POSTB=邮政小包  、GTO=国通、
     * YUNDA=韵达、JD=京东配送、DD=当当宅配、OTHER=其他
     * 最长50字
     */
    public $logisticsCode;
    /**
     * @var string 物流公司名称
     * 最长200字
     */
    public $logisticsName;
    /**
     * @var string 运单号
     * 最长50字
     */
    public $expressCode;
    /**
     * @var string 供应商编码
     * 最长50字
     */
    public $supplierCode;
    /**
     * @var string 供应商名称
     * 最长50字
     */
    public $supplierName;
    /**
     * @var string 操作员编码
     * 最长50字
     */
    public $operatorCode;
    /**
     * @var string 操作员名称
     * 最长50字
     */
    public $operatorName;
    /**
     * @var string 操作时间
     * YYYY-MM-DD HH:MM:SS
     * 最长19字
     */
    public $operateTime;
    /**
     * @var SenderInfo 发件人信息对象
     */
    public $senderInfo;
    /**
     * @var ReceiverInfo 收件人信息对象
     */
    public $receiverInfo;
    /**
     * @var string 备注
     * 最长500字
     */
    public $remark;
}