<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Inventory\UnFreeze\OrderLine;
use chocoboxxf\Cwms\Model\Inventory\UnFreeze\OrderLines;
use chocoboxxf\Cwms\Model\Inventory\UnFreeze\UnFreeze;

class InventoryUnFreezeTest extends BaseTest
{
    public function testSync()
    {
        $orderLine = [];
        $orderLine[] = OrderLine::newInstance([
            'itemCode' => 'DPB002001',
            'normalFlag' => '正常品',
            'frozenQuantity' => 1,
        ]);
        $orderLines = OrderLines::newInstance([
            'orderLine' => $orderLine,
        ]);
        $freeze = UnFreeze::newInstance([
            'unFreezeOrderNum' => 'DPB00200003',
            'ownerCode' => 'DPB002',
            'warehouseCode' => 'LS001',
            'orderLines' => $orderLines,
        ]);
        $ret = $this->client->inventoryUnFreeze($freeze->toXML());
        var_dump($ret);
    }
}