<?php
/**
 * 查询条件对象
 * User: chocoboxxf
 * Date: 2018/1/9
 */
namespace chocoboxxf\Cwms\Model\Inventory\Monitoring;

use chocoboxxf\Cwms\Model\Base;

/**
 * 查询条件对象
 * @package chocoboxxf\Cwms\Model\Inventory\Monitoring
 */
class InventoryMonitoring extends Base
{
    /**
     * @var string 仓库名称
     * 最长50字
     */
    public $warehouseName;
    /**
     * @var string 货主编码
     * 最长50字
     */
    public $customerCode;
    /**
     * @var string 商品编码
     * 必填，最长50字
     */
    public $itemCode;
}