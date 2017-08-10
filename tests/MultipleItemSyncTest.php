<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/7
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Item\Item;
use chocoboxxf\Cwms\Model\Item\Items;
use chocoboxxf\Cwms\Model\Item\MultipleItem;

class MultipleItemSyncTest extends BaseTest
{
    public function testSync()
    {
        $item = [];
        $item[] = Item::newInstance([
            'itemCode' => 'DPB002002',
            'itemName' => '测试商品2',
            'barCode' => 'DPB002002',
            'itemType' => Item::ITEM_TYPE_ZC,
        ]);
        $item[] = Item::newInstance([
            'itemCode' => 'DPB002003',
            'itemName' => '测试商品3',
            'barCode' => 'DPB002003',
            'itemType' => Item::ITEM_TYPE_ZC,
        ]);
        $items = Items::newInstance([
            'item' => $item,
        ]);
        $multipleItem = MultipleItem::newInstance([
            'actionType' => 'ADD',
            'warehouseCode' => 'LS001',
            'ownerCode' => 'DPB002',
            'items' => $items,
        ]);
        $ret = $this->client->multipleItemSync($multipleItem->toXML());
        var_dump($ret);
    }
}