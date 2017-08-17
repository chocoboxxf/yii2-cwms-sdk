<?php
/**
 * C-WMS SDK
 * User: chocoboxxf
 * Date: 2017/8/7
 */
namespace chocoboxxf\Cwms;

use chocoboxxf\Cwms\Http\Client;
use yii\base\Component;
use yii\base\InvalidConfigException;

class Cwms extends Component
{
    /**
     * 数据格式
     */
    const FORMAT_XML = 'xml'; // XML格式
    const FORMAT_JSON = 'json'; // JSON格式
    /**
     * 接口方法
     */
    const METHOD_SINGLE_ITEM_SYNC = 'singleitem.synchronize'; // 商品同步接口
    const METHOD_MULTIPLE_ITEM_SYNC = 'items.synchronize'; // 商品同步接口（批量）
    const METHOD_CUSTOMER_SYNC = 'customer.sync'; // 货主同步
    const METHOD_ENTRY_ORDER_CREATE = 'entryorder.create'; // 入库单创建接口
    const METHOD_ORDER_CANCEL = 'order.cancel'; // 单据取消接口
    const METHOD_INVENTORY_QUERY = 'inventory.query'; // 库存查询接口
    const METHOD_INVENTORY_FREEZE = 'inventory.frozen'; // 库存冻结
    const METHOD_INVENTORY_UNFREEZE = 'inventory.unFrozen'; // 库存解冻
    const METHOD_DELIVERY_ORDER_CREATE = 'deliveryorder.create'; // 入库单创建接口
    const METHOD_STOCKOUT_CREATE = 'stockout.create'; // 出库单创建接口
    /**
     * 接口方法对应版本号
     */
    public $methodVersions = [
        Cwms::METHOD_SINGLE_ITEM_SYNC => '2.0',
        Cwms::METHOD_MULTIPLE_ITEM_SYNC => '2.0',
        Cwms::METHOD_CUSTOMER_SYNC => '2.0',
        Cwms::METHOD_ENTRY_ORDER_CREATE => '2.0',
        Cwms::METHOD_ORDER_CANCEL => '2.0',
        Cwms::METHOD_INVENTORY_QUERY => '2.0',
        Cwms::METHOD_INVENTORY_FREEZE => '2.0',
        Cwms::METHOD_INVENTORY_UNFREEZE => '2.0',
        Cwms::METHOD_DELIVERY_ORDER_CREATE => '2.0',
        Cwms::METHOD_STOCKOUT_CREATE => '2.0',
    ];
    /**
     * API服务器地址
     * @var string
     */
    public $url;
    /**
     * 应用接入时申请的App Key
     * @var string
     */
    public $appKey;
    /**
     * 应用接入时申请的Secret Key
     * @var string
     */
    public $secretKey;
    /**
     * C-WMS颁发给用户的ID
     * @var string
     */
    public $customerId;
    /**
     * content格式，默认XML
     * @var string
     */
    public $format = Cwms::FORMAT_XML;
    /**
     * API Client
     * @var \chocoboxxf\Cwms\Http\Client
     */
    protected $client;

    public function init()
    {
        parent::init();
        if (!isset($this->url)) {
            throw new InvalidConfigException('请先配置API接口地址');
        }
        if (!isset($this->appKey)) {
            throw new InvalidConfigException('请先配置App Key');
        }
        if (!isset($this->secretKey)) {
            throw new InvalidConfigException('请先配置Secret Key');
        }
        if (!isset($this->customerId)) {
            throw new InvalidConfigException('请先配置Customer ID');
        }
        $this->client = new Client($this->url, $this->appKey, $this->secretKey, $this->customerId);
    }

    /**
     * 商品同步接口
     * @param \chocoboxxf\Cwms\Model\Item\SingleItem $singleItem
     * @return array
     */
    public function singleItemSync($singleItem)
    {
        return $this->request(
            Cwms::METHOD_SINGLE_ITEM_SYNC,
            $this->methodVersions[Cwms::METHOD_SINGLE_ITEM_SYNC],
            $singleItem
        );
    }

    /**
     * 商品同步接口（批量）
     * @param \chocoboxxf\Cwms\Model\Item\MultipleItem $multipleItem
     * @return array
     */
    public function multipleItemSync($multipleItem)
    {
        return $this->request(
            Cwms::METHOD_MULTIPLE_ITEM_SYNC,
            $this->methodVersions[Cwms::METHOD_MULTIPLE_ITEM_SYNC],
            $multipleItem
        );
    }

    /**
     * 货主同步
     * @param \chocoboxxf\Cwms\Model\Customer\Customer $customer
     * @return array
     */
    public function customerSync($customer)
    {
        return $this->request(
            Cwms::METHOD_CUSTOMER_SYNC,
            $this->methodVersions[Cwms::METHOD_CUSTOMER_SYNC],
            $customer
        );
    }

    /**
     * 入库单创建接口
     * @param \chocoboxxf\Cwms\Model\Order\Entry\Order $entryOrder
     * @return array
     */
    public function entryOrderCreate($entryOrder)
    {
        return $this->request(
            Cwms::METHOD_ENTRY_ORDER_CREATE,
            $this->methodVersions[Cwms::METHOD_ENTRY_ORDER_CREATE],
            $entryOrder
        );
    }

    /**
     * 单据取消接口
     * @param \chocoboxxf\Cwms\Model\Order\Cancel $cancel
     * @return array
     */
    public function orderCancel($cancel)
    {
        return $this->request(
            Cwms::METHOD_ORDER_CANCEL,
            $this->methodVersions[Cwms::METHOD_ORDER_CANCEL],
            $cancel
        );
    }

    /**
     * 库存查询接口
     * @param \chocoboxxf\Cwms\Model\Inventory\Query\Query $query
     * @return array
     */
    public function inventoryQuery($query)
    {
        return $this->request(
            Cwms::METHOD_INVENTORY_QUERY,
            $this->methodVersions[Cwms::METHOD_INVENTORY_QUERY],
            $query
        );
    }

    /**
     * 库存冻结
     * @param \chocoboxxf\Cwms\Model\Inventory\Freeze\Freeze $freeze
     * @return array
     */
    public function inventoryFreeze($freeze)
    {
        return $this->request(
            Cwms::METHOD_INVENTORY_FREEZE,
            $this->methodVersions[Cwms::METHOD_INVENTORY_FREEZE],
            $freeze
        );
    }

    /**
     * 库存解冻
     * @param \chocoboxxf\Cwms\Model\Inventory\UnFreeze\UnFreeze $unFreeze
     * @return array
     */
    public function inventoryUnFreeze($unFreeze)
    {
        return $this->request(
            Cwms::METHOD_INVENTORY_UNFREEZE,
            $this->methodVersions[Cwms::METHOD_INVENTORY_UNFREEZE],
            $unFreeze
        );
    }

    /**
     * 入库单创建接口
     * @param \chocoboxxf\Cwms\Model\Order\Delivery\Order $deliveryOrder
     * @return array
     */
    public function deliveryOrderCreate($deliveryOrder)
    {
        return $this->request(
            Cwms::METHOD_DELIVERY_ORDER_CREATE,
            $this->methodVersions[Cwms::METHOD_DELIVERY_ORDER_CREATE],
            $deliveryOrder
        );
    }

    /**
     * 出库单创建接口
     * @param \chocoboxxf\Cwms\Model\Stockout\Order $stockoutOrder
     * @return array
     */
    public function stockoutCreate($stockoutOrder)
    {
        return $this->request(
            Cwms::METHOD_STOCKOUT_CREATE,
            $this->methodVersions[Cwms::METHOD_STOCKOUT_CREATE],
            $stockoutOrder
        );
    }

    /**
     * 调用方法
     * @param string $requestName 方法名称
     * @param string $requestVersion 方法版本号
     * @param \chocoboxxf\Cwms\Model\Base $requestObject 请求参数对象
     * @return array
     */
    public function request($requestName, $requestVersion, $requestObject)
    {
        $params = [
            'v' => $requestVersion,
        ];
        // 目前都是POST请求方式
        $result = $this->client->request('POST', $requestName, $params, [], $requestObject->toXML());
        return $result;
    }
}