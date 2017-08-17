<?php
/**
 * 出库单创建接口测试
 * User: chocoboxxf
 * Date: 2017/8/17
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Stockout\DeliveryOrder;
use chocoboxxf\Cwms\Model\Stockout\Order;
use chocoboxxf\Cwms\Model\Stockout\OrderLine;
use chocoboxxf\Cwms\Model\Stockout\OrderLines;
use chocoboxxf\Cwms\Model\Stockout\ReceiverInfo;

/**
 * 出库单创建接口测试
 * @package chocoboxxf\Cwms\Tests
 */
class StockoutCreateTest extends BaseTest
{
    public function testSync()
    {
        $orderLine = [];
        $orderLine[] = OrderLine::newInstance([
            // 必填
            'ownerCode' => 'DPB002',
            'itemCode' => 'DPB002001',
            'planQty' => 10,
            // 非必填
            'outBizCode' => 'DPB00200120170817',
            'orderLineNo' => 1, // 标记行号用来去重
        ]);
        $orderLines = OrderLines::newInstance([
            // 必填
            'orderLine' => $orderLine,
        ]);
        $receiverInfo = ReceiverInfo::newInstance([
            // 必填
            'name' => '收件人',
            'mobile' => '13000000000',
            'province' => '江苏省',
            'city' => '南京市',
            'detailAddress' => 'y路',
            // 非必填
            'company' => '收件公司',
            'zipCode' => '200000',
            'tel' => '55555555',
            'email' => 'receiver@test.com',
            'countryCode' => '中国',
            'area' => '雨花台区',
            'town' => 'x镇',
        ]);
        $deliverOrder = DeliveryOrder::newInstance([
            // 必填
            'deliveryOrderCode' => 'DPB0020001',
            'orderType' => DeliveryOrder::ORDER_TYPE_QTCK,
            'warehouseCode' => 'LS001',
            'createTime' => '2017-08-08 00:11:22',
            'receiverInfo' => $receiverInfo,
            // 非必填
            'totalOrderLines' => 1,
        ]);
        $order = Order::newInstance([
            // 必填
            'deliveryOrder' => $deliverOrder,
            'orderLines' => $orderLines,
        ]);
        $ret = $this->client->stockoutCreate($order);
        var_dump($ret);
    }
}