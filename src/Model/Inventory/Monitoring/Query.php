<?php
/**
 * 库存监控接口请求对象
 * User: chocoboxxf
 * Date: 2018/1/9
 */
namespace chocoboxxf\Cwms\Model\Inventory\Monitoring;

use chocoboxxf\Cwms\Model\Base;

/**
 * 库存监控接口请求对象
 * @package chocoboxxf\Cwms\Model\Inventory\Monitoring
 */
class Query extends Base
{
    /**
     * @var InventoryMonitoringList 查询条件数组对象
     * 必填
     */
    public $inventoryMonitoringList;
}