<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Inventory\Query\Criteria;
use chocoboxxf\Cwms\Model\Inventory\Query\CriteriaList;
use chocoboxxf\Cwms\Model\Inventory\Query\Query;

class InventoryQueryTest extends BaseTest
{
    public function testSync()
    {
        $criteria = [];
        $criteria[] = Criteria::newInstance([
            'itemCode' => 'DPB002001',
//            'itemId' => 'ST1708080000004',
            'ownerCode' => 'DPB002',
        ]);
        $criteriaList = CriteriaList::newInstance([
            'criteria' => $criteria,
        ]);
        $query = Query::newInstance([
            'criteriaList' => $criteriaList,
        ]);
        var_dump($query->toXML());
        $ret = $this->client->inventoryQuery($query->toXML());
        var_dump($ret);
    }
}