<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Customer\Customer;

class CustomerSyncTest extends BaseTest
{
    public function testSync()
    {
        $customer = Customer::newInstance([
            'country' => '中国',
            'province' => '江苏省',
            'city' => '南京市',
            'district' => '雨花台区',
            'contactor' => '张三',
            'customerCode' => 'DPB002',
            'customerName' => '张三',
        ]);
        $ret = $this->client->customerSync($customer->toXML());
        var_dump($ret);
    }
}