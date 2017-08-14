<?php
/**
 * 货主同步接口测试
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Customer\Customer;

/**
 * 货主同步接口测试
 * @package chocoboxxf\Cwms\Tests
 */
class CustomerSyncTest extends BaseTest
{
    public function testSync()
    {
        $customer = Customer::newInstance([
            // 必填
            'country' => '中国',
            'province' => '江苏省',
            'city' => '南京市',
            'district' => '雨花台区',
            'contactor' => '张三',
            'customerCode' => 'DPB002',
            'customerName' => '张三',
            // 非必填
            'street' => '安德门大街',
            'zipcode' => '212000',
            'phone' => '55555555',
            'email' => 'test@test.com',
            'personalPhone' => '13000000000',
            'fax' => '55555555',
        ]);
        $ret = $this->client->customerSync($customer->toXML());
        var_dump($ret);
    }
}