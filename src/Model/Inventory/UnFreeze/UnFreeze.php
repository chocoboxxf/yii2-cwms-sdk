<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Inventory\UnFreeze;

use chocoboxxf\Cwms\Model\Base;

class UnFreeze extends Base
{
    const ROOT_NODE = 'InventoryUnFreeze';

    public $unFreezeOrderNum;

    public $ownerCode;

    public $warehouseCode;

    public $orderLines;

    public function __construct(array $config = [])
    {
        $this->rootNode = UnFreeze::ROOT_NODE;
        parent::__construct($config);
    }
}