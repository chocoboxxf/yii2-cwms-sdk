<?php
/**
 * 库存冻结接口请求对象
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Inventory\Freeze;

use chocoboxxf\Cwms\Model\Base;

/**
 * 库存冻结接口请求对象
 * @package chocoboxxf\Cwms\Model\Inventory\Freeze
 */
class Freeze extends Base
{
    /**
     * Root节点名称
     */
    const ROOT_NODE = 'InventoryFreeze';
    /**
     * @var string 客户冻结单号
     * 必填，最长50字
     */
    public $freezeOrderNum;
    /**
     * @var string 货主编码
     * 必填，最长50字
     */
    public $ownerCode;
    /**
     * @var string 仓库编码
     * 必填，最长50字
     */
    public $warehouseCode;
    /**
     * @var OrderLines 冻结商品列表对象
     * 必填
     */
    public $orderLines;
    /**
     * Freeze constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->rootNode = Freeze::ROOT_NODE;
        parent::__construct($config);
    }
}