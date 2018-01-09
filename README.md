# yii2-cwms-sdk
基于Yii2实现的C-WMS API SDK（目前开发中）

环境条件
--------
- >= PHP 5.4
- >= Yii 2.0
- >= GuzzleHttp 6.0

安装
----

添加下列代码在``composer.json``文件中并执行``composer update --no-dev``操作

```json
{
    "require": {
       "chocoboxxf/yii2-cwms-sdk": "dev-master"
    }
}
```

设置方法
--------

```php
// 全局使用
// 在config/main.php配置文件中定义component配置信息
'components' => [
  .....
  'cwms' => [
    'class' => 'chocoboxxf\Cwms\Cwms',
    'url' => 'http://cwms-api:xxxx/api', // C-WMS API入口地址
    'appKey' => '1234', // C-WMS App Key
    'secretKey' => '123456', // C-WMS Secret Key
    'customerId' => 'testUser', // C-WMS 客户号
  ]
  ....
]
// 代码中调用（调用货主同步接口示例）
$customer = Customer::newInstance([
    'country' => '中国',
    'province' => '江苏省',
    'city' => '南京市',
    'district' => '雨花台区',
    'contactor' => '张三',
    'customerCode' => 'DPB002',
    'customerName' => '张三',
]); // 创建货主同步接口请求对象
$result = Yii::$app->cwms->customerSync($customer); // 调用货主同步接口
....
```

```php
// 局部调用
$cwms = Yii::createObject([
    'class' => 'chocoboxxf\Cwms\Cwms',
    'url' => 'http://cwms-api:xxxx/api', // C-WMS API入口地址
    'appKey' => '1234', // C-WMS App Key
    'secretKey' => '123456', // C-WMS Secret Key
    'customerId' => 'testUser', // C-WMS 客户号
]);
// 调用货主同步接口示例
$customer = Customer::newInstance([
    'country' => '中国',
    'province' => '江苏省',
    'city' => '南京市',
    'district' => '雨花台区',
    'contactor' => '张三',
    'customerCode' => 'DPB002',
    'customerName' => '张三',
]); // 创建货主同步接口请求对象
$result = Yii::$app->cwms->customerSync($customer); // 调用货主同步接口
....
```

使用示例
--------

货主同步接口

```php
$customer = Customer::newInstance([
    'country' => '中国',
    'province' => '江苏省',
    'city' => '南京市',
    'district' => '雨花台区',
    'contactor' => '张三',
    'customerCode' => 'DPB002',
    'customerName' => '张三',
]); // 创建货主同步接口请求对象

$result = Yii::$app->cwms->customerSync($customer); // 调用货主同步接口

if ($result['flag'] === 'success') {
    // 调用成功
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "success",
    //     "code": "200",
    //     "message": "接收成功",
    //     "entryOrderId": "DPB002"
    // }
    ....
} else {
    // 调用失败
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "failure",
    //     "code": "400",
    //     "message": "货主已存在"
    // }
    ....
}
....
```

商品同步接口

```php
$item = Item::newInstance([
    'itemCode' => 'DPB002001',
    'itemName' => '测试商品1',
    'barCode' => 'DPB002001',
    'itemType' => Item::ITEM_TYPE_ZC,
]); // 创建商品对象

$singleItem = SingleItem::newInstance([
    'actionType' => SingleItem::ACTION_TYPE_ADD,
    'warehouseCode' => 'LS001',
    'ownerCode' => 'DPB002',
    'item' => $item,
]); // 创建商品同步接口请求对象

$result = Yii::$app->cwms->singleItemSync($singleItem); // 调用商品同步接口

if ($result['flag'] === 'success') {
    // 调用成功
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "success",
    //     "code": "200",
    //     "message": "接收成功",
    //     "itemId": "ST1708080000004"
    // }
    ....
} else {
    // 调用失败
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "failure",
    //     "code": "400",
    //     "message": "同步商品出错"
    // }
    ....
}
....
```

批量商品同步接口

```php
$item = [];

$item[] = Item::newInstance([
    'itemCode' => 'DPB002002',
    'itemName' => '测试商品2',
    'barCode' => 'DPB002002',
    'itemType' => Item::ITEM_TYPE_ZC,
]); // 创建商品对象1

$item[] = Item::newInstance([
    'itemCode' => 'DPB002003',
    'itemName' => '测试商品3',
    'barCode' => 'DPB002003',
    'itemType' => Item::ITEM_TYPE_ZC,
]); // 创建商品对象2

$items = Items::newInstance([
    'item' => $item,
]); // 创建商品列表对象

$multipleItem = MultipleItem::newInstance([
    'actionType' => MultipleItem::ACTION_TYPE_ADD,
    'warehouseCode' => 'LS001',
    'ownerCode' => 'DPB002',
    'items' => $items,
]); 创建批量商品同步接口请求对象

$result = Yii::$app->cwms->multipleItemSync($multipleItem); // 调用批量商品同步接口

if ($result['flag'] === 'success') {
    // 调用成功
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "success",
    //     "code": "200",
    //     "message": "成功"
    // }
    ....
} else {
    // 调用失败
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "success",
    //     "code": "400",
    //     "message": "货主【DPB002】不存在"
    // }
    ....
}
....
```

入库单创建接口

```php
$orderLine = [];

$orderLine[] = OrderLine::newInstance([
    'ownerCode' => 'DPB002',
    'itemCode' => 'DPB002001',
    'planQty' => 100,
]); // 创建入库商品对象1

$orderLine[] = OrderLine::newInstance([
    'ownerCode' => 'DPB002',
    'itemCode' => 'DPB002002',
    'planQty' => 200,
]); // 创建入库商品对象2

$orderLines = OrderLines::newInstance([
    'orderLine' => $orderLine,
]); // 创建入库商品列表对象

$entryOrder = EntryOrder::newInstance([
    'entryOrderCode' => 'DPB0020004',
    'ownerCode' => 'DPB002',
    'warehouseCode' => 'LS001',
]); // 创建入库单基本信息对象

$order = Order::newInstance([
    'entryOrder' => $entryOrder,
    'orderLines' => $orderLines,
]); // 创建入库单创建接口请求对象

$result = Yii::$app->cwms->entryOrderCreate($order); // 调用入库单创建接口

if ($result['flag'] === 'success') {
    // 调用成功
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "success",
    //     "code": "200",
    //     "message": "接收成功",
    //     "entryOrderId": "DPB0020004"
    // }
    ....
} else {
    // 调用失败
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "failure",
    //     "code": "400",
    //     "message": "订单已存在"
    // }
    ....
}
....
```

单据取消接口

```php
$cancel = Cancel::newInstance([
    // 必填
    'warehouseCode' => 'LS001',
    'orderCode' => 'DPB0020001',
]); // 创建单据取消接口请求对象

$result = Yii::$app->cwms->orderCancel($cancel); // 调用单据取消接口

if ($result['flag'] === 'success') {
    // 调用成功
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "success",
    //     "code": "200",
    //     "message": "单据取消成功！"
    // }
    ....
} else {
    // 调用失败
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "failure",
    //     "code": "400",
    //     "message": "订单不存在"
    // }
    ....
}
....
```

库存查询接口

```php
$criteria = [];

$criteria[] = Criteria::newInstance([
    'itemCode' => 'DPB002001',
    'ownerCode' => 'DPB002',
]); // 创建查询条件对象1

$criteria[] = Criteria::newInstance([
    'itemCode' => 'DPB002002',
    'ownerCode' => 'DPB002',
]); // 创建查询条件对象2

$criteriaList = CriteriaList::newInstance([
    'criteria' => $criteria,
]); // 创建查询条件组合对象

$query = Query::newInstance([
    'criteriaList' => $criteriaList,
]); // 创建库存查询接口请求对象

$result = Yii::$app->cwms->inventoryQuery($query); // 调用库存查询接口

if ($result['flag'] === 'success') {
    // 调用成功
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "success",
    //     "code": "200",
    //     "message": "接收成功",
    //     "items": [
    //         {
    //              "item": {
    //                  "warehouseCode": "LS001",
    //                  "itemCode": "DPB002001",
    //                  "itemId": "ST1708080000004",
    //                  "inventoryType": "ZP",
    //                  "quantity": "300",
    //                  "lockQuantity": "0",
    //                  "locationInfos": [
    //                      {
    //                          "locationInfo": {
    //                             "locationName": "A-01",
    //                              "quantity": "100",
    //                              "lockQuantity": "0"
    //                          }
    //                      },
    //                      {
    //                          "locationInfo": {
    //                             "locationName": "A-02",
    //                              "quantity": "200",
    //                              "lockQuantity": "0"
    //                          }
    //                      }
    //                  ]
    //              }
    //         },
    //         {
    //              "item": {
    //                  "warehouseCode": "LS001",
    //                  "itemCode": "DPB002002",
    //                  "itemId": "ST1708080000005",
    //                  "inventoryType": "ZP",
    //                  "quantity": "100",
    //                  "lockQuantity": "0",
    //                  "locationInfos": [
    //                      {
    //                          "locationInfo": {
    //                             "locationName": "A-01",
    //                              "quantity": "100",
    //                              "lockQuantity": "0"
    //                          }
    //                      }
    //                  ]
    //              }
    //         }
    //     ]
    // }
    ....
} else {
    // 调用失败
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "failure",
    //     "code": "400",
    //     "message": "未匹配到对应货主:DPB002"
    // }
    ....
}
....
```

库存冻结接口

```php
$orderLine = [];

$orderLine[] = OrderLine::newInstance([
    'itemCode' => 'DPB002001',
    'normalFlag' => OrderLine::NORMAL_FLAG_NORMAL,
    'frozenQuantity' => 2,
]); // 创建冻结商品对象1

$orderLine[] = OrderLine::newInstance([
    'itemCode' => 'DPB002002',
    'normalFlag' => OrderLine::NORMAL_FLAG_NORMAL,
    'frozenQuantity' => 2,
]); // 创建冻结商品对象2

$orderLines = OrderLines::newInstance([
    'orderLine' => $orderLine,
]); // 创建冻结商品列表对象

$freeze = Freeze::newInstance([
    'freezeOrderNum' => 'DPB00200001',
    'ownerCode' => 'DPB002',
    'warehouseCode' => 'LS001',
    'orderLines' => $orderLines,
]); // 创建库存冻结接口请求对象

$result = Yii::$app->cwms->inventoryFreeze($freeze); // 调用库存冻结接口

if ($result['flag'] === 'success') {
    // 调用成功
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "success",
    //     "code": "400",
    //     "message": "接收成功"
    // }
    ....
} else {
    // 调用失败
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "failure",
    //     "code": "400",
    //     "message": "客户冻结单号已存在"
    // }
    ....
}
....
```

库存解冻接口

```php
$orderLine = [];

$orderLine[] = OrderLine::newInstance([
    'itemCode' => 'DPB002001',
    'normalFlag' => OrderLine::NORMAL_FLAG_NORMAL,
    'frozenQuantity' => 1,
]); // 创建解冻商品对象1

$orderLine[] = OrderLine::newInstance([
    'itemCode' => 'DPB002002',
    'normalFlag' => OrderLine::NORMAL_FLAG_NORMAL,
    'frozenQuantity' => 1,
]); // 创建解冻商品对象2

$orderLines = OrderLines::newInstance([
    'orderLine' => $orderLine,
]); // 创建解冻商品列表对象

$unFreeze = UnFreeze::newInstance([
    'unFreezeOrderNum' => 'DPB00200001',
    'ownerCode' => 'DPB002',
    'warehouseCode' => 'LS001',
    'orderLines' => $orderLines,
]); // 创建库存解冻接口请求对象

$result = Yii::$app->cwms->inventoryUnFreeze($unFreeze); // 调用库存解冻接口

if ($result['flag'] === 'success') {
    // 调用成功
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "success",
    //     "code": "400",
    //     "message": "接收成功"
    // }
    ....
} else {
    // 调用失败
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "failure",
    //     "code": "400",
    //     "message": "客户解冻单号已存在"
    // }
    ....
}
....
```

发货单创建接口

```php
$orderLine = [];

$orderLine[] = OrderLine::newInstance([
    'ownerCode' => 'DPB002',
    'itemCode' => 'DPB002001',
    'planQty' => 10,
    'actualPrice' => 11.2,
]); // 创建发货商品对象1

$orderLine[] = OrderLine::newInstance([
    'ownerCode' => 'DPB002',
    'itemCode' => 'DPB002002',
    'planQty' => 20,
    'actualPrice' => 12.2,
]); // 创建发货商品对象2

$orderLines = OrderLines::newInstance([
    'orderLine' => $orderLine,
]); // 创建发货商品列表对象

$senderInfo = SenderInfo::newInstance([
    'name' => '发件人',
    'mobile' => '13000000000',
    'province' => '江苏省',
    'city' => '南京市',
    'detailAddress' => 'y路',
]); // 创建发件人信息对象

$receiverInfo = ReceiverInfo::newInstance([
    'name' => '收件人',
    'mobile' => '13000000000',
    'province' => '江苏省',
    'city' => '南京市',
    'detailAddress' => 'y路',
]); // 创建收件人信息对象

$deliverOrder = DeliveryOrder::newInstance([
    'deliveryOrderCode' => 'DPB0020001',
    'orderType' => DeliveryOrder::ORDER_TYPE_JYCK,
    'warehouseCode' => 'LS001',
    'sourcePlatformCode' => DeliveryOrder::SOURCE_PLATFORM_CODE_OTHER,
    'createTime' => '2017-08-08 00:11:22',
    'placeOrderTime' => '2017-08-08 00:11:22',
    'operateTime' => '2017-08-08 00:11:22',
    'shopNick' => '店铺1',
    'logisticsCode' => DeliveryOrder::LOGISTICS_CODE_SF,
    'senderInfo' => $senderInfo,
    'receiverInfo' => $receiverInfo,
]); // 创建发货单基本信息对象

$order = Order::newInstance([
    'deliveryOrder' => $deliverOrder,
    'orderLines' => $orderLines,
]); // 创建发货单创建接口请求对象

$result = Yii::$app->cwms->deliveryOrderCreate($order); // 调用发货单创建接口

if ($result['flag'] === 'success') {
    // 调用成功
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "success",
    //     "code": "200",
    //     "message": "接收成功",
    //     "deliveryOrderId": "DPB0020004"
    // }
    ....
} else {
    // 调用失败
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "failure",
    //     "code": "400",
    //     "message": "承运商不存在"
    // }
    ....
}
....
```

出库单创建接口

```php
$orderLine = [];

$orderLine[] = OrderLine::newInstance([
    'ownerCode' => 'DPB002',
    'itemCode' => 'DPB002001',
    'planQty' => 10,
]); // 创建出库商品对象1

$orderLines = OrderLines::newInstance([
    'orderLine' => $orderLine,
]); // 创建出库商品列表对象

$pickerInfo = PickerInfo::newInstance([
    'company' => '收件公司',
    'name' => '收件人',
    'tel' => '55555555',
    'mobile' => '13000000000',
    'id' => '310101198808080000',
    'carNo' => '沪A88888',
]); // 创建提货人信息对象

$senderInfo = SenderInfo::newInstance([
    'name' => '发件人',
    'mobile' => '13000000000',
    'province' => '江苏省',
    'city' => '南京市',
    'detailAddress' => 'y路',
    'company' => '发件公司',
    'zipCode' => '200000',
    'tel' => '55555555',
    'email' => 'sender@test.com',
    'countryCode' => '中国',
    'area' => '雨花台区',
    'town' => 'x镇',
]); // 创建发件人信息对象

$receiverInfo = ReceiverInfo::newInstance([
    'name' => '收件人',
    'mobile' => '13000000000',
    'province' => '江苏省',
    'city' => '南京市',
    'detailAddress' => 'y路',
]); // 创建收件人信息对象

$deliverOrder = DeliveryOrder::newInstance([
    'deliveryOrderCode' => 'DPB0020001',
    'orderType' => DeliveryOrder::ORDER_TYPE_QTCK,
    'warehouseCode' => 'LS001',
    'createTime' => '2017-08-08 00:11:22',
    'receiverInfo' => $receiverInfo,
]); // 创建出库单基本信息对象

$order = Order::newInstance([
    'deliveryOrder' => $deliverOrder,
    'orderLines' => $orderLines,
]); // 创建出库单创建接口请求对象

$result = Yii::$app->cwms->stockoutCreate($order); // 调用出库单创建接口

if ($result['flag'] === 'success') {
    // 调用成功
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "success",
    //     "code": "200",
    //     "message": "接收成功",
    //     "deliveryOrderId": "DPB0020004"
    // }
    ....
} else {
    // 调用失败
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "failure",
    //     "code": "400",
    //     "message": "货主不存在"
    // }
    ....
}
....
```

库存监控接口

```php
$inventoryMonitoring = [];

$inventoryMonitoring[] = InventoryMonitoring::newInstance([
    'warehouseName' => 'LS001',
    'customerCode' => 'DPB002',
    'itemCode' => 'DPB002001',
]); // 创建查询条件对象1

$inventoryMonitoring[] = InventoryMonitoring::newInstance([
    'warehouseName' => 'LS001',
    'customerCode' => 'DPB002',
    'itemCode' => 'DPB002002',
]); // 创建查询条件对象2

$inventoryMonitoringList = InventoryMonitoringList::newInstance([
    'inventoryMonitoring' => $inventoryMonitoring,
]); // 创建查询条件组合对象

$query = Query::newInstance([
    'inventoryMonitoringList' => $inventoryMonitoringList,
]); // 创建库存监控接口请求对象

$result = Yii::$app->cwms->inventoryMonitor($query); // 调用库存监控接口

if ($result['flag'] === 'success') {
    // 调用成功
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "success",
    //     "code": "200",
    //     "items": {
    //         "item": [
    //             {
    //                 "warehouseName": "LS001",
    //                 "customerName": "张三",
    //                 "itemCode": "DPB002001",
    //                 "itemName": "测试商品1",
    //                 "barcodeNum": "DPB002001",
    //                 "normalFlag": "ZP",
    //                 "lockQuantity": "0",
    //                 "allQuantity": "800",
    //                 "diffQuantity": "800"
    //             },
    //             {
    //                 "warehouseName": "LS001",
    //                 "customerName": "张三",
    //                 "itemCode": "DPB002002",
    //                 "itemName": "测试商品4",
    //                 "barcodeNum": "DPB002002",
    //                 "normalFlag": "ZP",
    //                 "lockQuantity": "0",
    //                 "allQuantity": "0",
    //                 "diffQuantity": "0"
    //             }
    //         ]
    //     }
    // }
    ....
} else {
    // 调用失败
    // 返回数据格式（原格式XML，转义成json）
    // {
    //     "flag": "failure",
    //     "code": "400",
    //     "message": "货主编码不能为空"
    // }
    ....
}
....
```