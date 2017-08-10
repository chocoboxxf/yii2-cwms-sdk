<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Order\Entry\EntryOrder;
use chocoboxxf\Cwms\Model\Order\Entry\Order;
use chocoboxxf\Cwms\Model\Order\Entry\OrderLine;
use chocoboxxf\Cwms\Model\Order\Entry\OrderLines;

class EntryOrderCreateTest extends BaseTest
{
    public function testSync()
    {
        $orderLine = [];
        $orderLine[] = OrderLine::newInstance([
            'ownerCode' => 'DPB002',
            'itemCode' => 'DPB002001',
            'itemId' => 'ST1708080000004',
            'planQty' => 100,
        ]);
        $orderLine[] = OrderLine::newInstance([
            'ownerCode' => 'DPB002',
            'itemCode' => 'DPB002001',
            'itemId' => 'ST1708080000004',
            'planQty' => 200,
        ]);
        $orderLines = OrderLines::newInstance([
            'orderLine' => $orderLine,
        ]);
        $entryOrder = EntryOrder::newInstance([
            'totalOrderLines' => 2,
            'entryOrderCode' => 'DPB0020003',
            'ownerCode' => 'DPB002',
            'warehouseCode' => 'LS001',
        ]);
        $order = Order::newInstance([
            'entryOrder' => $entryOrder,
            'orderLines' => $orderLines,
        ]);
        $ret = $this->client->entryOrderCreate($order->toXML());
        var_dump($ret);
    }
}