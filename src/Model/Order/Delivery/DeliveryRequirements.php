<?php
/**
 * 快递需求对象
 * User: chocoboxxf
 * Date: 2017/8/16
 */
namespace chocoboxxf\Cwms\Model\Order\Delivery;

use chocoboxxf\Cwms\Model\Base;

/**
 * 快递需求对象
 * @package chocoboxxf\Cwms\Model\Order\Delivery
 */
class DeliveryRequirements extends Base
{
    /**
     * 投递时延要求枚举项
     */
    const SCHEDULE_TYPE_WORKDAY = 1; // 工作日
    const SCHEDULE_TYPE_HOLIDAY = 2; // 节假日
    const SCHEDULE_TYPE_TODAY = 101; // 当日达
    const SCHEDULE_TYPE_TOMORROW_MORNING = 102; // 次晨达
    const SCHEDULE_TYPE_TOMORROW = 103; // 次日达
    const SCHEDULE_TYPE_BOOK = 104; // 预约达
    /**
     * 发货服务类型
     */
    const DELIVERY_TYPE_PTPS = 'PTPS'; // 普通配送
    const DELIVERY_TYPE_LLPS = 'LLPS'; // 冷链配送
    /**
     * @var integer 投递时延要求
     * 1=工作日,2=节假日,101=当日达,102=次晨达,103=次日达, 104=预约达
     */
    public $scheduleType;
    /**
     * @var string 要求送达日期
     * 必填，最长50字
     */
    public $scheduleDay;
    /**
     * @var string 投递时间范围要求 (开始时间)
     * HH:MM:SS
     * 最长8字
     */
    public $scheduleStartTime;
    /**
     * @var string 投递时间范围要求 (结束时间)
     * HH:MM:SS
     * 最长8字
     */
    public $scheduleEndTime;
    /**
     * @var string 发货服务类型
     * PTPS（普通配送），LLPS（冷链配送）
     */
    public $deliveryType;
}