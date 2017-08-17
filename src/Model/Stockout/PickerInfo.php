<?php
/**
 * 提货人信息对象
 * User: chocoboxxf
 * Date: 2017/8/17
 */
namespace chocoboxxf\Cwms\Model\Stockout;

use chocoboxxf\Cwms\Model\Base;

/**
 * 提货人信息对象
 * @package chocoboxxf\Cwms\Model\Stockout
 */
class PickerInfo extends Base
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
     * @var string 证件号
     * 最长50字
     */
    public $id;
    /**
     * @var string 车牌号
     * 最长50字
     */
    public $carNo;
}