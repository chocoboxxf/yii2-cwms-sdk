<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Inventory\UnFreeze;

use chocoboxxf\Cwms\Model\Base;

class OrderLine extends Base
{
    public $itemCode;

    public $normalFlag;

    public $frozenQuantity;

    public $frozenReason;
}