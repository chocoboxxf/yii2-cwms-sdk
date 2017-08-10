<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Order\Entry;

use chocoboxxf\Cwms\Model\Base;

class EntryOrder extends Base
{
    public $totalOrderLines;

    public $entryOrderCode;

    public $ownerCode;

    public $warehouseCode;

    public $senderInfo;

    public $receiverInfo;

    public $orderLines;
}