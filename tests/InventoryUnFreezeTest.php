<?php
/**
 * 库存解冻接口测试
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Inventory\UnFreeze\OrderLine;
use chocoboxxf\Cwms\Model\Inventory\UnFreeze\OrderLines;
use chocoboxxf\Cwms\Model\Inventory\UnFreeze\UnFreeze;

/**
 * 库存解冻接口测试
 * @package chocoboxxf\Cwms\Tests
 */
class InventoryUnFreezeTest extends BaseTest
{
    public function testSync()
    {
        $orderLine = [];
        $orderLine[] = OrderLine::newInstance([
            // 必填
            'itemCode' => 'DPB002001',
            'normalFlag' => OrderLine::NORMAL_FLAG_NORMAL,
            'frozenQuantity' => 1,
            // 非必填
            'barCode' => 'DPB002001',
            'locationName' => '',
            'zoneName' => 'HC',
            'itemName' => '测试商品1',
            'itemGroupName' => '',
            'frozenReason' => '解除质押',
        ]);
        $orderLines = OrderLines::newInstance([
            // 必填
            'orderLine' => $orderLine,
        ]);
        $unFreeze = UnFreeze::newInstance([
            // 必填
            'unFreezeOrderNum' => 'DPB00200001',
            'ownerCode' => 'DPB002',
            'warehouseCode' => 'LS001',
            'orderLines' => $orderLines,
        ]);
        $ret = $this->client->inventoryUnFreeze($unFreeze);
        var_dump($ret);
    }
}