<?php
/**
 * 发货单基本信息对象
 * User: chocoboxxf
 * Date: 2017/8/15
 */
namespace chocoboxxf\Cwms\Model\Order\Delivery;

use chocoboxxf\Cwms\Model\Base;

/**
 * 发货单基本信息对象
 * @package chocoboxxf\Cwms\Model\Order\Delivery
 */
class DeliveryOrder extends Base
{
    /**
     * 出库单类型枚举项
     */
    const ORDER_TYPE_JYCK = 'JYCK'; // 一般交易出库单
    const ORDER_TYPE_HHCK = 'HHCK'; // 换货出库单
    const ORDER_TYPE_CCRK = 'BFCK'; // 补发出库单
    const ORDER_TYPE_CGRK = 'QTCK'; // 其他出库单
    /**
     * 订单标记枚举项
     */
    const ORDER_FLAG_COD = 'COD'; // 货到付款
    const ORDER_FLAG_LIMIT = 'LIMIT'; // 限时配送
    const ORDER_FLAG_PRESELL = 'PRESELL'; // 预售
    const ORDER_FLAG_COMPLAIN = 'COMPLAIN'; // 已投诉
    const ORDER_FLAG_SPLIT = 'SPLIT'; // 拆单
    const ORDER_FLAG_EXCHANGE = 'EXCHANGE'; // 换货
    const ORDER_FLAG_VISIT = 'VISIT'; // 上门
    const ORDER_FLAG_MODIFYTRANSPORT = 'MODIFYTRANSPORT'; // 是否可改配送方式(默认可更改)
    const ORDER_FLAG_CONSIGN = 'CONSIGN'; // 物流宝代理发货(自动更改发货状态)
    const ORDER_FLAG_SELLER_AFFORD = 'SELLER_AFFORD'; // 是否卖家承担运费(默认是)
    const ORDER_FLAG_FENXIAO = 'FENXIAO'; // 分销订单
    /**
     * 订单来源平台编码枚举项
     */
    const SOURCE_PLATFORM_CODE_TB = 'TB'; // 淘宝
    const SOURCE_PLATFORM_CODE_TM = 'TM'; // 天猫
    const SOURCE_PLATFORM_CODE_JD = 'JD'; // 京东
    const SOURCE_PLATFORM_CODE_DD = 'DD'; // 当当
    const SOURCE_PLATFORM_CODE_PP = 'PP'; // 拍拍
    const SOURCE_PLATFORM_CODE_YX = 'YX'; // 易讯
    const SOURCE_PLATFORM_CODE_EBAY = 'EBAY'; // ebay
    const SOURCE_PLATFORM_CODE_QQ = 'QQ'; // QQ网购
    const SOURCE_PLATFORM_CODE_AMAZON = 'AMAZON'; // 亚马逊
    const SOURCE_PLATFORM_CODE_SN = 'SN'; // 苏宁
    const SOURCE_PLATFORM_CODE_GM = 'GM'; // 国美
    const SOURCE_PLATFORM_CODE_WPH = 'WPH'; // 唯品会
    const SOURCE_PLATFORM_CODE_JM = 'JM'; // 聚美
    const SOURCE_PLATFORM_CODE_LF = 'LF'; // 乐蜂
    const SOURCE_PLATFORM_CODE_MGJ = 'MGJ'; // 蘑菇街
    const SOURCE_PLATFORM_CODE_JS = 'JS'; // 聚尚
    const SOURCE_PLATFORM_CODE_PX = 'PX'; // 拍鞋
    const SOURCE_PLATFORM_CODE_YT = 'YT'; // 银泰
    const SOURCE_PLATFORM_CODE_YHD = 'YHD'; // 1号店
    const SOURCE_PLATFORM_CODE_VANCL = 'VANCL'; // 凡客
    const SOURCE_PLATFORM_CODE_YL = 'YL'; // 邮乐
    const SOURCE_PLATFORM_CODE_YG = 'YG'; // 优购
    const SOURCE_PLATFORM_CODE_1688 = '1688'; // 阿里巴巴
    const SOURCE_PLATFORM_CODE_POS = 'POS'; // POS门店
    const SOURCE_PLATFORM_CODE_OTHER = 'OTHER'; // 其他
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
     * @var string 出库单号
     * 必填，最长50字
     */
    public $deliveryOrderCode;
    /**
     * @var string 原出库单号，换货出库单必填
     * 最长50字
     */
    public $preDeliveryOrderCode;
    /**
     * @var string 原出库单号（C-WMS分配），换货出库单必填
     * 最长50字
     */
    public $preDeliveryOrderId;
    /**
     * @var string 出库单类型
     * JYCK=一般交易出库单, HHCK=换货出库单, BFCK=补发出库单，QTCK=其他出库单
     * 必填，最长50字
     */
    public $orderType;
    /**
     * @var string 仓库编码
     * 必填，最长50字
     */
    public $warehouseCode;
    /**
     * @var string 订单标记
     * 用字符串格式来表示订单标记列表： 比如COD, 中间用“^”来隔开
     * COD=货到付款, LIMIT=限时配送, PRESELL=预售, COMPLAIN=已投诉, SPLIT=拆单, EXCHANGE=换货,
     * VISIT=上门 , MODIFYTRANSPORT=是否可改配送方式(默认可更改), CONSIGN=物流宝代理发货(自动更改发货状态)
     * SELLER_AFFORD=是否卖家承担运费(默认是), FENXIAO=分销订单
     * 最长200字
     */
    public $orderFlag;
    /**
     * @var string 订单来源平台编码
     * TB= 淘宝 、TM=天猫 、JD=京东、DD=当当、PP=拍拍、YX=易讯、EBAY=ebay、QQ=QQ网购、AMAZON=亚马逊、
     * SN=苏宁、GM=国美、WPH=唯品会、JM=聚美、LF=乐蜂、MGJ=蘑菇街、JS=聚尚、PX=拍鞋、YT=银泰、
     * YHD=1号店、VANCL=凡客、YL=邮乐、YG=优购、1688=阿里巴巴、POS=POS门店、OTHER=其他
     * 必填，最长50字
     */
    public $sourcePlatformCode;
    /**
     * @var string 订单来源平台名称
     * 最长200字
     */
    public $sourcePlatformName;
    /**
     * @var string 发货单创建时间
     * YYYY-MM-DD HH:MM:SS
     * 必填，最长19字
     */
    public $createTime;
    /**
     * @var string 前台订单 (店铺订单) 创建时间 (下单时间)
     * YYYY-MM-DD HH:MM:SS
     * 必填，最长19字
     */
    public $placeOrderTime;
    /**
     * @var string 订单支付时间
     * YYYY-MM-DD HH:MM:SS
     * 最长19字
     */
    public $payTime;
    /**
     * @var string 支付平台交易号(淘系订单传支付宝交易号)
     * 最长50字
     */
    public $payNo;
    /**
     * @var string 操作员 (审核员) 编码
     * 最长50字
     */
    public $operatorCode;
    /**
     * @var string 操作员 (审核员) 名称
     * 最长50字
     */
    public $operatorName;
    /**
     * @var string 操作 (审核) 时间
     * YYYY-MM-DD HH:MM:SS
     * 必填，最长19字
     */
    public $operateTime;
    /**
     * @var string 店铺名称
     * 必填，最长200字
     */
    public $shopNick;
    /**
     * @var string 卖家名称
     * 必填，最长200字
     */
    public $sellerNick;
    /**
     * @var string 买家昵称
     * 必填，最长200字
     */
    public $buyerNick;
    /**
     * @var double 订单总金额 (元)
     * 订单总金额=应收金额+已收金额=商品总金额-订单折扣金额+快递费用
     * double(18, 2)
     */
    public $totalAmount;
    /**
     * @var double 商品总金额 (元)
     * double(18, 2)
     */
    public $itemAmount;
    /**
     * @var double 订单折扣金额 (元)
     * double(18, 2)
     */
    public $discountAmount;
    /**
     * @var double 快递费用 (元)
     * double(18, 2)
     */
    public $freight;
    /**
     * @var double 应收金额 (元)
     * 消费者还需要支付多少（货到付款时消费者还需要支付多少约定使用这个字段）
     * double(18, 2)
     */
    public $arAmount;
    /**
     * @var double 已收金额 (元)
     * 消费者已经支付多少
     * double(18, 2)
     */
    public $gotAmount;
    /**
     * @var double COD服务费
     * double(18, 2)
     */
    public $serviceFee;
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
     * @var string 运单号
     * 最长50字
     */
    public $expressCode;
    /**
     * @var string 快递区域编码
     * 最长50字
     */
    public $logisticsAreaCode;
    /**
     * @var DeliveryRequirements 快递需求对象
     */
    public $deliveryRequirements;
    /**
     * @var SenderInfo 发件人信息对象
     * 必填
     */
    public $senderInfo;
    /**
     * @var ReceiverInfo 收件人信息对象
     * 必填
     */
    public $receiverInfo;
    /**
     * @var string 是否紧急
     * Y/N, 默认为N
     */
    public $isUrgency;
    /**
     * @var string 是否需要发票
     * Y/N, 默认为N
     */
    public $invoiceFlag;
    /**
     * @var Invoices 发票列表对象
     * 需要发票时必填
     */
    public $invoices;
    /**
     * @var string 是否需要保险
     * Y/N, 默认为N
     */
    public $insuranceFlag;
    /**
     * @var Insurance 保险信息对象
     * 需要保险时必填
     */
    public $insurance;
    /**
     * @var string 买家留言
     * 最长500字
     */
    public $buyerMessage;
    /**
     * @var string 卖家留言
     * 最长500字
     */
    public $sellerMessage;
    /**
     * @var string 备注
     * 最长500字
     */
    public $remark;
}