<?php
/**
 * 查询条件组合对象
 * User: chocoboxxf
 * Date: 2017/8/8
 */
namespace chocoboxxf\Cwms\Model\Inventory\Query;

use chocoboxxf\Cwms\Model\Base;

/**
 * 查询条件组合对象
 * @package chocoboxxf\Cwms\Model\Inventory\Query
 */
class CriteriaList extends Base
{
    /**
     * @var Criteria[] 查询条件对象，数组
     * 必填
     */
    public $criteria;
}