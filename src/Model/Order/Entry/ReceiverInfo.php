<?php
/**
 * 收件人信息对象
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Order\Entry;

use chocoboxxf\Cwms\Model\Base;

/**
 * 收件人信息对象
 * @package chocoboxxf\Cwms\Model\Order\Entry
 */
class ReceiverInfo extends Base
{
    /**
     * @var string 公司名称
     * 最长200字
     */
    public $company;
    /**
     * @var string 姓名
     * 最长50字
     */
    public $name;
    /**
     * @var string 邮编
     * 最长50字
     */
    public $zipCode;
    /**
     * @var string 固定电话
     * 最长50字
     */
    public $tel;
    /**
     * @var string 移动电话
     * 最长50字
     */
    public $mobile;
    /**
     * @var string 电子邮箱
     * 最长50字
     */
    public $email;
    /**
     * @var string 国家二字码
     * 最长50字
     */
    public $countryCode;
    /**
     * @var string 省份
     * 最长50字
     */
    public $province;
    /**
     * @var string 城市
     * 最长50字
     */
    public $city;
    /**
     * @var string 区域
     * 最长50字
     */
    public $area;
    /**
     * @var string 村镇
     * 最长50字
     */
    public $town;
    /**
     * @var string 详细地址
     * 最长200字
     */
    public $detailAddress;
}