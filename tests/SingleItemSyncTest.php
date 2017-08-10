<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/7
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Item\Item;
use chocoboxxf\Cwms\Model\Item\SingleItem;

class SingleItemSyncTest extends BaseTest
{
    public function testSync()
    {
        $item = Item::newInstance([
            'itemCode' => 'DPB002001',
            'itemName' => '测试商品1',
            'barCode' => 'DPB002001',
            'itemType' => Item::ITEM_TYPE_ZC,
        ]);
        $singleItem = SingleItem::newInstance([
            'actionType' => 'ADD',
            'warehouseCode' => 'LS001',
            'ownerCode' => 'DPB002',
            'item' => $item,
        ]);
        $ret = $this->client->singleItemSync($singleItem->toXML());
        var_dump($ret);
    }
}