<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Inventory\Freeze;

use chocoboxxf\Cwms\Model\Base;

class Freeze extends Base
{
    const ROOT_NODE = 'InventoryFreeze';

    public $freezeOrderNum;

    public $ownerCode;

    public $warehouseCode;

    public $orderLines;

    public function __construct(array $config = [])
    {
        $this->rootNode = Freeze::ROOT_NODE;
        parent::__construct($config);
    }
}