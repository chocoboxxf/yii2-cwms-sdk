<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Customer;

use chocoboxxf\Cwms\Model\Base;

class Customer extends Base
{
    const ROOT_NODE = 'customer';

    public $country;

    public $province;

    public $city;

    public $district;

    public $contactor;

    public $customerCode;

    public $customerName;

    public function __construct(array $config = [])
    {
        $this->rootNode = Customer::ROOT_NODE;
        parent::__construct($config);
    }
}