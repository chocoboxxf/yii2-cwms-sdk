<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/7
 */
namespace chocoboxxf\Cwms\Model\Item;

use chocoboxxf\Cwms\Model\Base;

class Item extends Base
{
    //ZC=正常商品, FX=分销商品, ZH=组合商品, ZP=赠品, BC=包材, HC=耗材, FL=辅料, XN=虚拟品, FS=附属品, CC=残次品, OTHER=其它
    const ITEM_TYPE_ZC = 'ZC'; // 正常商品

    public $itemCode;

    public $itemId;

    public $itemName;

    public $barCode;

    public $itemType;
}