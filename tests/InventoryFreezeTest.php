<?php
/**
 * 库存冻结接口测试
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Inventory\Freeze\Freeze;
use chocoboxxf\Cwms\Model\Inventory\Freeze\OrderLine;
use chocoboxxf\Cwms\Model\Inventory\Freeze\OrderLines;

/**
 * 库存冻结接口测试
 * @package chocoboxxf\Cwms\Tests
 */
class InventoryFreezeTest extends BaseTest
{
    public function testSync()
    {
        $orderLine = [];
        $orderLine[] = OrderLine::newInstance([
            // 必填
            'itemCode' => 'DPB002001',
            'normalFlag' => OrderLine::NORMAL_FLAG_NORMAL,
            'frozenQuantity' => 2,
            // 非必填
            'barCode' => 'DPB002001',
            'locationName' => '',
            'zoneName' => 'HC',
            'itemName' => '测试商品1',
            'itemGroupName' => '',
            'frozenReason' => '入库质押',
        ]);
        $orderLines = OrderLines::newInstance([
            // 必填
            'orderLine' => $orderLine,
        ]);
        $freeze = Freeze::newInstance([
            // 必填
            'freezeOrderNum' => 'DPB00200001',
            'ownerCode' => 'DPB002',
            'warehouseCode' => 'LS001',
            'orderLines' => $orderLines,
        ]);
        $ret = $this->client->inventoryFreeze($freeze);
        var_dump($ret);
    }
}