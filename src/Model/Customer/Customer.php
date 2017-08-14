<?php
/**
 * 货主同步接口请求对象
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Customer;

use chocoboxxf\Cwms\Model\Base;

/**
 * 货主同步接口请求对象
 * @package chocoboxxf\Cwms\Model\Customer
 */
class Customer extends Base
{
    /**
     * Root节点名称
     */
    const ROOT_NODE = 'customer';
    /**
     * @var string 国家
     * 必填
     */
    public $country;
    /**
     * @var string 省
     * 必填
     */
    public $province;
    /**
     * @var string 市
     * 必填
     */
    public $city;
    /**
     * @var string 县/区
     * 必填
     */
    public $district;
    /**
     * @var string 街道
     */
    public $street;
    /**
     * @var string 邮编
     */
    public $zipcode;
    /**
     * @var string 联系人
     * 必填
     */
    public $contactor;
    /**
     * @var string 货主代码
     * 必填，唯一
     */
    public $customerCode;
    /**
     * @var string 货主名称
     * 必填，唯一
     */
    public $customerName;
    /**
     * @var string 联系人电话
     */
    public $phone;
    /**
     * @var string 联系人邮箱
     */
    public $email;
    /**
     * @var string 联系人手机
     */
    public $personalPhone;
    /**
     * @var string 联系人传真
     */
    public $fax;
    /**
     * Customer constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->rootNode = Customer::ROOT_NODE;
        parent::__construct($config);
    }
}