<?php
/**
 * 查询条件对象
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Inventory\Query;

use chocoboxxf\Cwms\Model\Base;

/**
 * 查询条件对象
 * @package chocoboxxf\Cwms\Model\Inventory\Query
 */
class Criteria extends Base
{
    /**
     * 库存类型枚举项
     */
    const INVENTORY_TYPE_ZP = 'ZP'; // 正品
    const INVENTORY_TYPE_CC = 'CC'; // 残次
    const INVENTORY_TYPE_JS = 'JS'; // 机损
    const INVENTORY_TYPE_XS = 'XS'; // 箱损
    const INVENTORY_TYPE_ZT = 'ZT'; // 在途库存
    /**
     * @var string 仓库编码
     * 最长50字
     */
    public $warehouseCode;
    /**
     * @var string 货主编码
     * 最长50字
     */
    public $ownerCode;
    /**
     * @var string 商品编码
     * 必填，最长50字
     */
    public $itemCode;
    /**
     * @var string 仓储系统商品ID
     * 最长50字
     */
    public $itemId;
    /**
     * @var string 库存类型
     * ZP=正品, CC=残次,JS=机损, XS= 箱损，ZT=在途库存，默认为查所有类型的库存
     * 最长50字
     */
    public $inventoryType;
}