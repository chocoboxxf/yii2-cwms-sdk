<?php
/**
 * 库存解冻接口请求对象
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Inventory\UnFreeze;

use chocoboxxf\Cwms\Model\Base;

/**
 * 库存解冻接口请求对象
 * @package chocoboxxf\Cwms\Model\Inventory\UnFreeze
 */
class UnFreeze extends Base
{
    /**
     * Root节点名称
     */
    const ROOT_NODE = 'InventoryUnFreeze';
    /**
     * @var string 客户解冻单号
     * 必填，最长50字
     */
    public $unFreezeOrderNum;
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
     * @var OrderLines 解冻商品列表对象
     * 必填
     */
    public $orderLines;
    /**
     * UnFreeze constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->rootNode = UnFreeze::ROOT_NODE;
        parent::__construct($config);
    }
}