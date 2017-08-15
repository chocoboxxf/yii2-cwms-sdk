<?php
/**
 * 库存查询接口测试
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Inventory\Query\Criteria;
use chocoboxxf\Cwms\Model\Inventory\Query\CriteriaList;
use chocoboxxf\Cwms\Model\Inventory\Query\Query;

/**
 * 库存查询接口测试
 * @package chocoboxxf\Cwms\Tests
 */
class InventoryQueryTest extends BaseTest
{
    public function testSync()
    {
        $criteria = [];
        $criteria[] = Criteria::newInstance([
            // 必填
            'itemCode' => 'DPB002001',
            'ownerCode' => 'DPB002',
            // 非必填
            'warehouseCode' => 'LS001',
            'itemId' => 'ST1708080000004',
            'inventoryType' => Criteria::INVENTORY_TYPE_ZP,
        ]);
        $criteriaList = CriteriaList::newInstance([
            // 必填
            'criteria' => $criteria,
        ]);
        $query = Query::newInstance([
            // 必填
            'criteriaList' => $criteriaList,
        ]);
        $ret = $this->client->inventoryQuery($query);
        var_dump($ret);
    }
}