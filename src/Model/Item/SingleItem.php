<?php
/**
 * 商品同步接口请求对象
 * User: chocoboxxf
 * Date: 2017/8/7
 */
namespace chocoboxxf\Cwms\Model\Item;

use chocoboxxf\Cwms\Model\Base;

/**
 * 商品同步接口请求对象
 * @package chocoboxxf\Cwms\Model\Item
 */
class SingleItem extends Base
{
    /**
     * 操作方式枚举项
     */
    const ACTION_TYPE_ADD = 'add'; // 新增
    const ACTION_TYPE_UPDATE = 'update'; // 更新
    /**
     * @var string 操作方式
     * add - 新增，update - 更新
     * 必填
     */
    public $actionType;
    /**
     * @var string 仓库编码
     * 必填
     */
    public $warehouseCode;
    /**
     * @var string 货主编码
     * 必填
     */
    public $ownerCode;
    /**
     * @var Item 商品对象
     * 必填
     */
    public $item;
}