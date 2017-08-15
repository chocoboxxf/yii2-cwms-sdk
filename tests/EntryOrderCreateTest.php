<?php
/**
 * 入库单创建接口测试
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Order\Entry\EntryOrder;
use chocoboxxf\Cwms\Model\Order\Entry\Order;
use chocoboxxf\Cwms\Model\Order\Entry\OrderLine;
use chocoboxxf\Cwms\Model\Order\Entry\OrderLines;
use chocoboxxf\Cwms\Model\Order\Entry\ReceiverInfo;
use chocoboxxf\Cwms\Model\Order\Entry\SenderInfo;

/**
 * 入库单创建接口测试
 * @package chocoboxxf\Cwms\Tests
 */
class EntryOrderCreateTest extends BaseTest
{
    public function testSync()
    {
        $orderLine = [];
        $orderLine[] = OrderLine::newInstance([
            // 必填
            'ownerCode' => 'DPB002',
            'itemCode' => 'DPB002001',
            'planQty' => 100,
            // 非必填
            'outBizCode' => 'DPB0020003002',
            'orderLineNo' => '1',
            'itemId' => 'ST1708080000004',
            'itemName' => '测试商品1',
            'skuProperty' => '冷冻',
            'purchasePrice' => 11.4,
            'retailPrice' => 11.2,
            'inventoryType' => OrderLine::INVENTORY_TYPE_ZP,
            'productDate' => '2017-08-08',
            'expireDate' => '2018-08-08',
            'produceCode' => '111',
            'batchCode' => '1110',
        ]);
        $orderLine[] = OrderLine::newInstance([
            // 必填
            'ownerCode' => 'DPB002',
            'itemCode' => 'DPB002001',
            'planQty' => 200,
            // 非必填
            'outBizCode' => 'DPB0020003002',
            'orderLineNo' => '2',
            'itemId' => 'ST1708080000004',
            'itemName' => '测试商品1',
            'skuProperty' => '冷冻',
            'purchasePrice' => 11.4,
            'retailPrice' => 11.2,
            'inventoryType' => OrderLine::INVENTORY_TYPE_ZP,
            'productDate' => '2017-08-08',
            'expireDate' => '2018-08-08',
            'produceCode' => '111',
            'batchCode' => '1110',
        ]);
        $orderLines = OrderLines::newInstance([
            // 必填
            'orderLine' => $orderLine,
        ]);
        $senderInfo = SenderInfo::newInstance([
            // 非必填
            'company' => '发件公司',
            'name' => '发件人',
            'zipCode' => '200000',
            'tel' => '55555555',
            'mobile' => '13000000000',
            'email' => 'sender@test.com',
            'countryCode' => '中国',
            'province' => '江苏省',
            'city' => '南京市',
            'area' => '雨花台区',
            'town' => 'x镇',
            'detailAddress' => 'y路',
        ]);
        $receiverInfo = ReceiverInfo::newInstance([
            // 非必填
            'company' => '收件公司',
            'name' => '收件人',
            'zipCode' => '200000',
            'tel' => '55555555',
            'mobile' => '13000000000',
            'email' => 'receiver@test.com',
            'countryCode' => '中国',
            'province' => '江苏省',
            'city' => '南京市',
            'area' => '雨花台区',
            'town' => 'x镇',
            'detailAddress' => 'y路',
        ]);
        $entryOrder = EntryOrder::newInstance([
            // 必填
            'entryOrderCode' => 'DPB0020004',
            'ownerCode' => 'DPB002',
            'warehouseCode' => 'LS001',
            // 非必填
            'totalOrderLines' => 2,
            'purchaseOrderCode' => '1111',
            'orderCreateTime' => '2017-08-08 00:11:22',
            'orderType' => EntryOrder::ORDER_TYPE_CGRK,
            'expectStartTime' => '2017-08-15 00:11:22',
            'expectEndTime' => '2017-08-17 00:11:22',
            'logisticsCode' => EntryOrder::LOGISTICS_CODE_SF,
            'logisticsName' => '顺丰',
            'expressCode' => '9999999999',
            'supplierCode' => 'YR',
            'supplierName' => '雨润',
            'operatorCode' => '001',
            'operatorName' => '测试员001',
            'operateTime' => '2017-08-08 00:11:22',
            'senderInfo' => $senderInfo,
            'receiverInfo' => $receiverInfo,
        ]);
        $order = Order::newInstance([
            // 必填
            'entryOrder' => $entryOrder,
            'orderLines' => $orderLines,
        ]);
        $ret = $this->client->entryOrderCreate($order);
        var_dump($ret);
    }
}