<?php
/**
 * 库存查询接口请求对象
 * User: chocoboxxf
 * Date: 2017/8/9
 */
namespace chocoboxxf\Cwms\Model\Inventory\Query;

use chocoboxxf\Cwms\Model\Base;

/**
 * 库存查询接口请求对象
 * @package chocoboxxf\Cwms\Model\Inventory\Query
 */
class Query extends Base
{
    /**
     * @var CriteriaList 查询条件数组对象
     * 必填
     */
    public $criteriaList;
}