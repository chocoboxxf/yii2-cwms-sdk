<?php
/**
 * 查询条件组合对象
 * User: chocoboxxf
 * Date: 2018/1/9
 */
namespace chocoboxxf\Cwms\Model\Inventory\Monitoring;

use chocoboxxf\Cwms\Model\Base;

/**
 * 查询条件组合对象
 * @package chocoboxxf\Cwms\Model\Inventory\Monitoring
 */
class InventoryMonitoringList extends Base
{
    /**
     * @var InventoryMonitoring[] 查询条件对象，数组
     * 必填
     */
    public $inventoryMonitoring;
}