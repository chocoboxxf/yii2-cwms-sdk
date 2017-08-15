<?php
/**
 * 冻结商品对象
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Inventory\Freeze;

use chocoboxxf\Cwms\Model\Base;

/**
 * 冻结商品对象
 * @package chocoboxxf\Cwms\Model\Inventory\Freeze
 */
class OrderLine extends Base
{
    /**
     * 商品形态枚举项
     */
    const NORMAL_FLAG_NORMAL = '正常品';
    const NORMAL_FLAG_BAD = '不良品';
    /**
     * @var string 商品编码
     * 必填,最长50字
     */
    public $itemCode;
    /**
     * @var string 条形码
     * 必填
     */
    public $barCode;
    /**
     * @var string 商品形态
     * 必填
     */
    public $normalFlag;
    /**
     * @var string 库位
     */
    public $locationName;
    /**
     * @var string 库区名称
     */
    public $zoneName;
    /**
     * @var string 商品名称
     * 最长200字
     */
    public $itemName;
    /**
     * @var string 商品品类
     */
    public $itemGroupName;
    /**
     * @var integer 冻结数量
     * 必填
     */
    public $frozenQuantity;
    /**
     * @var string 冻结原因
     */
    public $frozenReason;
}