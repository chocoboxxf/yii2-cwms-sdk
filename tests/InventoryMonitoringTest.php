<?php
/**
 * 库存监控接口测试
 * User: chocoboxxf
 * Date: 2018/1/9
 */
namespace chocoboxxf\Cwms\Tests;

use chocoboxxf\Cwms\Model\Inventory\Monitoring\InventoryMonitoring;
use chocoboxxf\Cwms\Model\Inventory\Monitoring\InventoryMonitoringList;
use chocoboxxf\Cwms\Model\Inventory\Monitoring\Query;

/**
 * 库存监控接口测试
 * @package chocoboxxf\Cwms\Tests
 */
class InventoryMonitoringTest extends BaseTest
{
    public function testSync()
    {
        $inventoryMonitoring = [];
        $inventoryMonitoring[] = InventoryMonitoring::newInstance([
            // 必填
            'warehouseName' => 'LS001',
            'customerCode' => 'DPB002',
            'itemCode' => 'DPB002001',
        ]);
        $inventoryMonitoring[] = InventoryMonitoring::newInstance([
            // 必填
            'warehouseName' => 'LS001',
            'customerCode' => 'DPB002',
            'itemCode' => 'DPB002002',
        ]);
        $inventoryMonitoringList = InventoryMonitoringList::newInstance([
            // 必填
            'inventoryMonitoring' => $inventoryMonitoring,
        ]);
        $query = Query::newInstance([
            // 必填
            'inventoryMonitoringList' => $inventoryMonitoringList,
        ]);
        $ret = $this->client->inventoryMonitor($query);
        var_dump($ret);
    }
}