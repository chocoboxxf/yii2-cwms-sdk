<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Order\Cancel;

class OrderCancelTest extends BaseTest
{
    public function testSync()
    {
        $cancel = Cancel::newInstance([
            'warehouseCode' => 'LS001',
            'ownerCode' => 'DPB002',
            'orderCode' => 'DPB0020001',
            'orderId' => 'DPB0020001',
            'orderType' => 'CGRK',
            'cancelReason' => '测试取消',
        ]);
        $ret = $this->client->orderCancel($cancel->toXML());
        var_dump($ret);
    }
}