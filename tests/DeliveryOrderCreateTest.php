<?php
/**
 * 发货单创建接口测试
 * User: chocoboxxf
 * Date: 2017/8/16
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Order\Delivery\DeliveryOrder;
use chocoboxxf\Cwms\Model\Order\Delivery\DeliveryRequirements;
use chocoboxxf\Cwms\Model\Order\Delivery\Detail;
use chocoboxxf\Cwms\Model\Order\Delivery\Insurance;
use chocoboxxf\Cwms\Model\Order\Delivery\Invoice;
use chocoboxxf\Cwms\Model\Order\Delivery\Invoices;
use chocoboxxf\Cwms\Model\Order\Delivery\Item;
use chocoboxxf\Cwms\Model\Order\Delivery\Items;
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
            'orderLineNo' => '1',
            'sourceOrderCode' => 'ORDER001',
            'subSourceOrderCode' => 'SUBORDER001001',
            'payNo' => 'PAY001',
            'itemId' => 'ST1708080000004',
            'inventoryType' => OrderLine::INVENTORY_TYPE_ZP,
            'itemName' => '测试商品1',
            'extCode' => 'SP001',
            'retailPrice' => 11.3,
            'discountAmount' => 1.5,
            'batchCode' => '1110',
            'productDate' => '2017-08-08',
            'expireDate' => '2018-08-08',
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
        $deliveryRequirements = DeliveryRequirements::newInstance([
            // 非必填
            'scheduleType' => DeliveryRequirements::SCHEDULE_TYPE_WORKDAY,
            'scheduleDay' => '2017-08-28',
            'scheduleStartTime' => '08:11:22',
            'scheduleEndTime' => '18:11:22',
            'deliveryType' => DeliveryRequirements::DELIVERY_TYPE_LLPS,
        ]);
        $item = [];
        $item[] = Item::newInstance([
            'itemName' => '吃的东西',
            'unit' => '包',
            'price' => 111.3,
            'quantity' => 1,
            'amount' => 111.3,
        ]);
        $items = Items::newInstance([
            'item' => $item,
        ]);
        $detail = Detail::newInstance([
            'items' => $items,
        ]);
        $invoice = [];
        $invoice[] = Invoice::newInstance([
            'type' => Invoice::TYPE_INVOICE,
            'header' => '某某公司',
            'amount' => 111.3,
            'content' => '吃的东西',
            'detail' => $detail,
        ]);
        $invoices = Invoices::newInstance([
            'invoice' => $invoice,
        ]);
        $insurance = Insurance::newInstance([
            'type' => '意外险',
            'amount' => 10.0,
        ]);
        $deliverOrder = DeliveryOrder::newInstance([
            // 必填
            'deliveryOrderCode' => 'DPB0020002',
            'orderType' => DeliveryOrder::ORDER_TYPE_HHCK,
            'warehouseCode' => 'LS001',
            'sourcePlatformCode' => DeliveryOrder::SOURCE_PLATFORM_CODE_OTHER,
            'createTime' => '2017-08-08 00:11:22',
            'placeOrderTime' => '2017-08-08 00:11:22',
            'operateTime' => '2017-08-08 00:11:22',
            'shopNick' => '店铺1',
            'logisticsCode' => 'KP',//DeliveryOrder::LOGISTICS_CODE_SF,
            'senderInfo' => $senderInfo,
            'receiverInfo' => $receiverInfo,
            // 非必填
            'preDeliveryOrderCode' => 'DPB0020001',
            'preDeliveryOrderId' => 'DPB0020001',
            'orderFlag' => DeliveryOrder::ORDER_FLAG_COD,
            'sourcePlatformName' => '其他',
            'payTime' => '2017-08-08 00:11:22',
            'payNo' => 'PAY001',
            'operatorCode' => 'DPBOP001',
            'operatorName' => '操作员1',
            'sellerNick' => '卖家1',
            'buyerNick' => '买家1',
            'totalAmount' => 111.3,
            'itemAmount' => 111.2,
            'discountAmount' => 11.5,
            'freight' => 21.5,
            'arAmount' => 91.5,
            'gotAmount' => 31.5,
            'serviceFee' => 31.5,
            'logisticsName' => '顺丰',
            'expressCode' => '9999999999',
            'logisticsAreaCode' => 'SH',
            'deliveryRequirements' => $deliveryRequirements,
            'isUrgency' => 'Y',
            'invoiceFlag' => 'Y',
            'invoices' => $invoices,
            'insuranceFlag' => 'Y',
            'insurance' => $insurance,
            'buyerMessage' => '买家留言1',
            'sellerMessage' => '卖家留言1',
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