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
     * 当单据需要分多个请求发送时，发送方需要将totalOrderLines填入，接收方收到后，
     * 根据实际接收到的条数和totalOrderLines进行比对，如果小于，则继续等待接收请求。
     * 如果等于，则表示该单据的所有请求发送完成。
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
     * @var string 要求出库时间
     * YYYY-MM-DD
     * 最长10字
     */
    public $scheduleDate;
    /**
     * @var string 物流公司编码
     * SF=顺丰、EMS=标准快递、EYB=经济快件、ZJS=宅急送、YTO=圆通  、ZTO=中通 (ZTO) 、HTKY=百世汇通、
     * UC=优速、STO=申通、TTKDEX=天天快递  、QFKD=全峰、FAST=快捷、POSTB=邮政小包  、GTO=国通、
     * YUNDA=韵达、JD=京东配送、DD=当当宅配、OTHER=其他
     * 必填，最长50字
     */
    public $logisticsCode;
    /**
     * @var string 物流公司名称
     * 最长200字
     */
    public $logisticsName;
    /**
     * @var string 提货方式
     * 到仓自提，快递，干线物流
     */
    public $transportMode;
    /**
     * @var PickerInfo 提货人信息对象
     */
    public $pickerInfo;
    /**
     * @var SenderInfo 发件人信息对象
     */
    public $senderInfo;
    /**
     * @var ReceiverInfo 收件人信息对象
     * 必填
     */
    public $receiverInfo;
    /**
     * @var string 备注
     * 最长500字
     */
    public $remark;
}