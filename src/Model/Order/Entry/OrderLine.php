<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Order\Entry;

use chocoboxxf\Cwms\Model\Base;

class OrderLine extends Base
{
    public $ownerCode;

    public $itemCode;

    public $itemId;

    public $itemName;

    public $planQty;
}