<?php
/**
 * 单据取消接口请求对象
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Order;

use chocoboxxf\Cwms\Model\Base;

/**
 * 单据取消接口请求对象
 * @package chocoboxxf\Cwms\Model\Order
 */
class Cancel extends Base
{
    /**
     * 单据类型枚举项
     */
    const ORDER_TYPE_JYCK = 'JYCK'; // 一般交易出库单
    const ORDER_TYPE_HHCK = 'HHCK'; // 换货出库
    const ORDER_TYPE_BFCK = 'BFCK'; // 补发出库
    const ORDER_TYPE_PTCK = 'PTCK'; // 普通出库单
    const ORDER_TYPE_DBCK = 'DBCK'; // 调拨出库
    const ORDER_TYPE_B2BRK = 'B2BRK'; // B2B入库B2B入库
    const ORDER_TYPE_B2BCK = 'B2BCK'; // B2B出库
    const ORDER_TYPE_QTCK = 'QTCK'; // 其他出库
    const ORDER_TYPE_SCRK = 'SCRK'; // 生产入库
    const ORDER_TYPE_LYRK = 'LYRK'; // 领用入库
    const ORDER_TYPE_CCRK = 'CCRK'; // 残次品入库
    const ORDER_TYPE_CGRK = 'CGRK'; // 采购入库
    const ORDER_TYPE_DBRK = 'DBRK'; // 调拨入库
    const ORDER_TYPE_QTRK = 'QTRK'; // 其他入库
    const ORDER_TYPE_XTRK = 'XTRK'; // 销退入库
    const ORDER_TYPE_HHRK = 'HHRK'; // 换货入库
    const ORDER_TYPE_CNJG = 'CNJG'; // 仓内加工单
    /**
     * @var string 仓库编码
     * 必填，最长50字
     */
    public $warehouseCode;
    /**
     * @var string 货主编码
     * 必填，最长50字
     */
    public $ownerCode;
    /**
     * @var string 单据编码
     * 必填，最长50字
     */
    public $orderCode;
    /**
     * @var string 仓储系统单据编码
     * 最长50字
     */
    public $orderId;
    /**
     * @var string 单据类型
     * JYCK= 一般交易出库单，HHCK= 换货出库 ，BFCK= 补发出库 PTCK=普通出库单，DBCK=调拨出库 ，B2BRK=B2B入库，
     * B2BCK=B2B出库，QTCK=其他出库， SCRK=生产入库，LYRK=领用入库，CCRK=残次品入库，CGRK=采购入库 ，
     * DBRK= 调拨入库 ，QTRK= 其他入库 ，XTRK= 销退入库 HHRK= 换货入库 CNJG= 仓内加工单
     */
    public $orderType;
    /**
     * @var string 取消原因
     * 最长500字
     */
    public $cancelReason;
}