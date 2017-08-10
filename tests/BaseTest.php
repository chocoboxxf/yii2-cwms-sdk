<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/7
 */
namespace chocoboxxf\Cwms\Tests;

use Yii;

class BaseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \chocoboxxf\Cwms\Cwms
     */
    protected $client;

    public function setUp()
    {
        parent::setUp();
        $this->client = Yii::createObject([
            'class' => 'chocoboxxf\Cwms\Cwms',
            'url' => $_ENV['CWMS_URL'],
            'appKey' => $_ENV['APP_KEY'],
            'secretKey' => $_ENV['SECRET_KEY'],
            'customerId' => $_ENV['CUSTOMER_ID'],
        ]);
    }
}
