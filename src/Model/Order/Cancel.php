<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Order;

use chocoboxxf\Cwms\Model\Base;

class Cancel extends Base
{
    public $warehouseCode;

    public $ownerCode;

    public $orderCode;

    public $orderId;

    public $orderType;

    public $cancelReason;
}