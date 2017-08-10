<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Inventory\Freeze\Freeze;
use chocoboxxf\Cwms\Model\Inventory\Freeze\OrderLine;
use chocoboxxf\Cwms\Model\Inventory\Freeze\OrderLines;

class InventoryFreezeTest extends BaseTest
{
    public function testSync()
    {
        $orderLine = [];
        $orderLine[] = OrderLine::newInstance([
            'itemCode' => 'DPB002001',
            'normalFlag' => '正常品',
            'frozenQuantity' => 2,
        ]);
        $orderLines = OrderLines::newInstance([
            'orderLine' => $orderLine,
        ]);
        $freeze = Freeze::newInstance([
            'freezeOrderNum' => 'DPB00200001',
            'ownerCode' => 'DPB002',
            'warehouseCode' => 'LS001',
            'orderLines' => $orderLines,
        ]);
        $ret = $this->client->inventoryFreeze($freeze->toXML());
        var_dump($ret);
    }
}