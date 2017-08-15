<?php
/**
 * 商品同步接口测试
 * User: chocoboxxf
 * Date: 2017/8/7
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Item\Item;
use chocoboxxf\Cwms\Model\Item\SingleItem;

/**
 * 商品同步接口测试
 * @package chocoboxxf\Cwms\Tests
 */
class SingleItemSyncTest extends BaseTest
{
    public function testSync()
    {
        $item = Item::newInstance([
            // 必填
            'itemCode' => 'DPB002001',
            'itemName' => '测试商品1',
            'barCode' => 'DPB002001',
            'itemType' => Item::ITEM_TYPE_ZC,
            // 非必填
            'itemId' => 'ST1708080000004',
            'shortName' => '简称1',
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
            'title' => '测试商品1',
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
        $singleItem = SingleItem::newInstance([
            // 必填
            'actionType' => SingleItem::ACTION_TYPE_ADD,
            'warehouseCode' => 'LS001',
            'ownerCode' => 'DPB002',
            'item' => $item,
            // 非必填
            'supplierCode' => '10000001',
            'supplierName' => '雨润',
        ]);
        $ret = $this->client->singleItemSync($singleItem);
        var_dump($ret);
    }
}