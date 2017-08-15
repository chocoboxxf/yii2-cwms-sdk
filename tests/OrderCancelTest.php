<?php
/**
 * 单据取消接口测试
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Order\Cancel;

/**
 * 单据取消接口测试
 * @package chocoboxxf\Cwms\Tests
 */
class OrderCancelTest extends BaseTest
{
    public function testSync()
    {
        $cancel = Cancel::newInstance([
            // 必填
            'warehouseCode' => 'LS001',
            'orderCode' => 'DPB0020001',
            // 非必填
            'ownerCode' => 'DPB002',
            'orderId' => 'P1708140000006',
            'orderType' => 'CGRK',
            'cancelReason' => '测试取消',
        ]);
        $ret = $this->client->orderCancel($cancel);
        var_dump($ret);
    }
}