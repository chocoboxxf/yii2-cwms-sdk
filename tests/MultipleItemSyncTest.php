<?php
/**
 * 商品同步接口（批量）测试
 * User: chocoboxxf
 * Date: 2017/8/7
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Item\Item;
use chocoboxxf\Cwms\Model\Item\Items;
use chocoboxxf\Cwms\Model\Item\MultipleItem;

/**
 * 商品同步接口（批量）测试
 * @package chocoboxxf\Cwms\Tests
 */
class MultipleItemSyncTest extends BaseTest
{
    public function testSync()
    {
        $item = [];
        $item[] = Item::newInstance([
            // 必填
            'itemCode' => 'DPB002002',
            'itemName' => '测试商品2',
            'barCode' => 'DPB002002',
            'itemType' => Item::ITEM_TYPE_ZC,
            // 非必填
            'shortName' => '简称2',
            'englishName' => 'Test ',
            'skuProperty' => '冷冻',
            'stockUnit' => 'g',
            'length' => 10.1,
            'width' => 10.2,
            'height' => 10.3,
            'volume' => 10.11,
            'grossWeight' => 10.12,
            'netWeight' => 10.13,
            'color' => '白色',
            'size' => 'XXL',
            'title' => '测试商品2',
            'categoryId' => '60',
            'categoryName' => '鸡副-鸡杂',
            'pricingCategory' => '鸡副-鸡杂',
            'safetyStock' => 1000000,
            'tagPrice' => 11.1,
            'retailPrice' => 11.2,
            'costPrice' => 11.3,
            'purchasePrice' => 11.4,
            'seasonCode' => 'SPRING',
            'seasonName' => '春季',
            'brandCode' => 'YR',
            'brandName' => '雨润',
            'isSNMgmt' => 'N',
            'productDate' => '2017-08-08',
            'expireDate' => '2018-08-08',
            'isShelfLifeMgmt' => 'Y',
            'shelfLife' => 8760,
            'rejectLifecycle' => 4380,
            'lockupLifecycle' => 180,
            'adventLifecycle' => 180,
            'isBatchMgmt' => 'Y',
            'batchCode' => 'PC001',
            'batchRemark' => '肉制品必须按批次',
            'parkCode' => 'BZ001',
            'pcs' => '25kg',
            'originAddress' => '中国-安徽',
            'approvalNumber' => 'PZ00001',
            'isFragile' => 'N',
            'isHazardous' => 'N',
            'remark' => '没什么好备注的',
            'createTime' => '2017-08-08 00:11:22',
            'updateTime' => '2017-08-09 00:22:33',
            'isValid' => 'Y',
            'isSku' => 'Y',
            'packageMaterial' => '纸箱',
        ]);
        $item[] = Item::newInstance([
            // 必填
            'itemCode' => 'DPB002003',
            'itemName' => '测试商品3',
            'barCode' => 'DPB002003',
            'itemType' => Item::ITEM_TYPE_ZC,
            // 非必填
            'shortName' => '简称3',
            'englishName' => 'Test ',
            'skuProperty' => '冷冻',
            'stockUnit' => 'g',
            'length' => 10.1,
            'width' => 10.2,
            'height' => 10.3,
            'volume' => 10.11,
            'grossWeight' => 10.12,
            'netWeight' => 10.13,
            'color' => '白色',
            'size' => 'XXL',
            'title' => '测试商品3',
            'categoryId' => '60',
            'categoryName' => '鸡副-鸡杂',
            'pricingCategory' => '鸡副-鸡杂',
            'safetyStock' => 1000000,
            'tagPrice' => 11.1,
            'retailPrice' => 11.2,
            'costPrice' => 11.3,
            'purchasePrice' => 11.4,
            'seasonCode' => 'SPRING',
            'seasonName' => '春季',
            'brandCode' => 'YR',
            'brandName' => '雨润',
            'isSNMgmt' => 'N',
            'productDate' => '2017-08-08',
            'expireDate' => '2018-08-08',
            'isShelfLifeMgmt' => 'Y',
            'shelfLife' => 8760,
            'rejectLifecycle' => 4380,
            'lockupLifecycle' => 180,
            'adventLifecycle' => 180,
            'isBatchMgmt' => 'Y',
            'batchCode' => 'PC001',
            'batchRemark' => '肉制品必须按批次',
            'parkCode' => 'BZ001',
            'pcs' => '25kg',
            'originAddress' => '中国-安徽',
            'approvalNumber' => 'PZ00001',
            'isFragile' => 'N',
            'isHazardous' => 'N',
            'remark' => '没什么好备注的',
            'createTime' => '2017-08-08 00:11:22',
            'updateTime' => '2017-08-09 00:22:33',
            'isValid' => 'Y',
            'isSku' => 'Y',
            'packageMaterial' => '纸箱',
        ]);
        $items = Items::newInstance([
            'item' => $item,
        ]);
        $multipleItem = MultipleItem::newInstance([
            'actionType' => MultipleItem::ACTION_TYPE_ADD,
            'warehouseCode' => 'LS001',
            'ownerCode' => 'DPB002',
            'items' => $items,
        ]);
        $ret = $this->client->multipleItemSync($multipleItem->toXML());
        var_dump($ret);
    }
}