<?php
/**
 * 商品对象
 * User: chocoboxxf
 * Date: 2017/8/7
 */
namespace chocoboxxf\Cwms\Model\Item;

use chocoboxxf\Cwms\Model\Base;

/**
 * 商品对象
 * @package chocoboxxf\Cwms\Model\Item
 */
class Item extends Base
{
    /**
     * 商品类型枚举项
     */
    const ITEM_TYPE_ZC = 'ZC'; // 正常商品
    const ITEM_TYPE_FX = 'FX'; // 分销商品
    const ITEM_TYPE_ZH = 'ZH'; // 组合商品
    const ITEM_TYPE_ZP = 'ZP'; // 赠品
    const ITEM_TYPE_BC = 'BC'; // 包材
    const ITEM_TYPE_HC = 'HC'; // 耗材
    const ITEM_TYPE_FL = 'FL'; // 辅料
    const ITEM_TYPE_XN = 'XN'; // 虚拟品
    const ITEM_TYPE_FS = 'FS'; // 附属品
    const ITEM_TYPE_CC = 'CC'; // 残次品
    const ITEM_TYPE_OTHER = 'OTHER'; // 其它
    /**
     * 是否枚举项
     */
    const IS_YES = 'Y'; // 是
    const IS_NO = 'N'; // 否
    /**
     * @var string 商品编码
     * 必填，最长50字
     */
    public $itemCode;
    /**
     * @var string 仓储系统商品编码
     * 必填，最长50字
     */
    public $itemId;
    /**
     * @var string 商品名称
     * 必填，最长200字
     */
    public $itemName;
    /**
     * @var string 商品简称
     * 最长200字
     */
    public $shortName;
    /**
     * @var string 英文名
     * 最长200字
     */
    public $englishName;
    /**
     * @var string 条形码
     * 可多个，用分号（;）隔开
     * 必填，最长500字
     */
    public $barCode;
    /**
     * @var string 商品属性
     * 如红色, XXL
     * 最长200字
     */
    public $skuProperty;
    /**
     * @var string 商品计量单位
     * 商品最小计量单位，值为g/KG/件
     * 最长50字
     */
    public $stockUnit;
    /**
     * @var double 长（厘米）
     * double(18, 2)
     */
    public $length;
    /**
     * @var double 宽（厘米）
     * double(18, 2)
     */
    public $width;
    /**
     * @var double 高（厘米）
     * double(18, 2)
     */
    public $height;
    /**
     * @var double 体积（升）
     * double(18, 3)
     */
    public $volume;
    /**
     * @var double 毛重（千克）
     * double(18, 3)
     */
    public $grossWeight;
    /**
     * @var double 净重（千克）
     * double(18, 3)
     */
    public $netWeight;
    /**
     * @var string 颜色
     * 最长50字
     */
    public $color;
    /**
     * @var string 尺寸
     * 最长50字
     */
    public $size;
    /**
     * @var string 渠道中的商品标题
     * 最长200字
     */
    public $title;
    /**
     * @var string 商品类别ID
     * 最长50字
     */
    public $categoryId;
    /**
     * @var string 商品类别名称
     * 最长200字
     */
    public $categoryName;
    /**
     * @var string 计价货类
     * 最长200字
     */
    public $pricingCategory;
    /**
     * @var integer 安全库存
     */
    public $safetyStock;
    /**
     * @var string 商品类型
     * ZC=正常商品, FX=分销商品, ZH=组合商品, ZP=赠品, BC=包材, HC=耗材, FL=辅料, XN=虚拟品, FS=附属品, CC=残次品, OTHER=其它
     * 必填，最长10字
     */
    public $itemType;
    /**
     * @var double 吊牌价
     * double(18, 2)
     */
    public $tagPrice;
    /**
     * @var double 零售价
     * double(18, 2)
     */
    public $retailPrice;
    /**
     * @var double 成本价
     * double(18, 2)
     */
    public $costPrice;
    /**
     * @var double 采购价
     * double(18, 2)
     */
    public $purchasePrice;
    /**
     * @var string 季节编码
     * 最长50字
     */
    public $seasonCode;
    /**
     * @var string 季节名称
     * 最长50字
     */
    public $seasonName;
    /**
     * @var string 品牌代码
     * 最长50字
     */
    public $brandCode;
    /**
     * @var string 品牌名称
     * 最长50字
     */
    public $brandName;
    /**
     * @var string 是否需要串号管理
     * Y/N (默认为N)
     */
    public $isSNMgmt;
    /**
     * @var string 生产日期
     * YYYY-MM-DD
     * 最长10字
     */
    public $productDate;
    /**
     * @var string 过期日期
     * YYYY-MM-DD
     * 最长10字
     */
    public $expireDate;
    /**
     * @var string 是否需要保质期管理
     * Y/N (默认为N)
     */
    public $isShelfLifeMgmt;
    /**
     * @var integer 保质期 (小时)
     */
    public $shelfLife;
    /**
     * @var integer 保质期禁收天数
     */
    public $rejectLifecycle;
    /**
     * @var integer 保质期禁售天数
     */
    public $lockupLifecycle;
    /**
     * @var integer 保质期临期预警天数
     */
    public $adventLifecycle;
    /**
     * @var string 是否需要批次管理
     * Y/N (默认为N)
     */
    public $isBatchMgmt;
    /**
     * @var string 批次代码
     * 最长50字
     */
    public $batchCode;
    /**
     * @var string 批次备注
     * 最长200字
     */
    public $batchRemark;
    /**
     * @var string 包装代码
     * 最长50字
     */
    public $packCode;
    /**
     * @var string 箱规
     * 最长50字
     */
    public $pcs;
    /**
     * @var string 商品的原产地
     * 最长50字
     */
    public $originAddress;
    /**
     * @var string 批准文号
     * 最长50字
     */
    public $approvalNumber;
    /**
     * @var string 是否易碎品
     * Y/N (默认为N)
     */
    public $isFragile;
    /**
     * @var string 是否危险品
     * Y/N (默认为N)
     */
    public $isHazardous;
    /**
     * @var string 备注
     * 最长500字
     */
    public $remark;
    /**
     * @var string 创建时间
     * YYYY-MM-DD HH:MM:SS
     * 最长19字
     */
    public $createTime;
    /**
     * @var string 更新时间
     * YYYY-MM-DD HH:MM:SS
     * 最长19字
     */
    public $updateTime;
    /**
     * @var string 是否有效
     * Y/N (默认为Y)
     */
    public $isValid;
    /**
     * @var string 是否sku
     * Y/N (默认为Y)
     */
    public $isSku;
    /**
     * @var string 商品包装材料类型
     * 最长200字
     */
    public $packageMaterial;
}