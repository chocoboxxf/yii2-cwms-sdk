<?php
/**
 * 发货单创建接口测试
 * User: chocoboxxf
 * Date: 2017/8/16
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Order\Delivery\DeliveryOrder;
use chocoboxxf\Cwms\Model\Order\Delivery\Order;
use chocoboxxf\Cwms\Model\Order\Delivery\OrderLine;
use chocoboxxf\Cwms\Model\Order\Delivery\OrderLines;
use chocoboxxf\Cwms\Model\Order\Delivery\ReceiverInfo;
use chocoboxxf\Cwms\Model\Order\Delivery\SenderInfo;

/**
 * 发货单创建接口测试
 * @package chocoboxxf\Cwms\Tests
 */
class DeliveryOrderCreateTest extends BaseTest
{
    public function testSync()
    {
        $orderLine = [];
        $orderLine[] = OrderLine::newInstance([
            // 必填
            'ownerCode' => 'DPB002',
            'itemCode' => 'DPB002001',
            'planQty' => 10,
            'actualPrice' => 11.2,
            // 非必填
        ]);
        $orderLines = OrderLines::newInstance([
            // 必填
            'orderLine' => $orderLine,
        ]);
        $senderInfo = SenderInfo::newInstance([
            // 必填
            'name' => '发件人',
            'mobile' => '13000000000',
            'province' => '江苏省',
            'city' => '南京市',
            'detailAddress' => 'y路',
            // 非必填
            'company' => '发件公司',
            'zipCode' => '200000',
            'tel' => '55555555',
            'email' => 'sender@test.com',
            'countryCode' => '中国',
            'area' => '雨花台区',
            'town' => 'x镇',
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
            'orderType' => DeliveryOrder::ORDER_TYPE_JYCK,
            'warehouseCode' => 'LS001',
            'sourcePlatformCode' => DeliveryOrder::SOURCE_PLATFORM_CODE_OTHER,
            'createTime' => '2017-08-08 00:11:22',
            'placeOrderTime' => '2017-08-08 00:11:22',
            'operateTime' => '2017-08-08 00:11:22',
            'shopNick' => '店铺1',
            'logisticsCode' => DeliveryOrder::LOGISTICS_CODE_SF,
            'senderInfo' => $senderInfo,
            'receiverInfo' => $receiverInfo,
            // 非必填
        ]);
        $order = Order::newInstance([
            // 必填
            'deliveryOrder' => $deliverOrder,
            'orderLines' => $orderLines,
        ]);
        $ret = $this->client->deliveryOrderCreate($order);
        var_dump($ret);
    }
}