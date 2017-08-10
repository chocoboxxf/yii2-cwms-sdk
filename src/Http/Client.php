<?php
/**
 * PHP File
 * User: chocoboxxf
 * Date: 2017/8/7
 */
namespace chocoboxxf\Cwms\Http;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use yii\web\MethodNotAllowedHttpException;

class Client
{
    /**
     * 使用签名算法
     */
    const SIGN_METHOD_MD5 = 'md5'; // MD5

    public $url;

    public $appKey;

    public $secretKey;

    public $customerId;

    public $client;

    public function __construct($url, $appKey, $secretKey, $customerId)
    {
        $this->url = $url;
        $this->appKey = $appKey;
        $this->secretKey = $secretKey;
        $this->customerId = $customerId;
        $this->client = new \GuzzleHttp\Client([
        ]);
    }

    public function request($method, $url, $params = [], $headers = [], $body = null)
    {
        $params['method'] = $url;
        $params['app_key'] = $this->appKey;
        $params['customerId'] = $this->customerId;
        $params['sign_method'] = self::SIGN_METHOD_MD5;
        $params['timestamp'] = date('Y-m-d H:i:s');
        $sign = $this->getSignature($params, $body === null ? '' : $body);
        $params['sign'] = $sign;
        if (strtoupper($method) === 'GET') {
            return $this->get($this->url, $params, $headers);
        } elseif (strtoupper($method) === 'POST') {
            return $this->post($this->url, $params, $headers, $body);
        }
        throw new MethodNotAllowedHttpException('不支持该HTTP请求方式');
    }

    /**
     * 生成sign签名
     * @param array $params 入参
     * @param string $body body数据
     * @return string
     */
    public function getSignature($params = [], $body = '')
    {
        $rawQuery = [];
        ksort($params);
        foreach ($params as $k => $v) {
            $rawQuery[] = sprintf('%s%s', $k, $v);
        }
        $rawText = implode('', $rawQuery);
        $signature = md5($this->secretKey . $rawText . $body . $this->secretKey);
        return strtoupper($signature);
    }

    /**
     * post请求
     * @param string $url 接口相对路径
     * @param array $data 接口传参
     * @param array $headers HTTP Header
     * @param null|string $body body数据
     * @return mixed
     */
    public function post($url, $data, $headers = [], $body = null)
    {
        $request = new Request('POST', $url, $headers, $body);
        $response = $this->client->send(
            $request,
            [
                'query' => $data,
            ]
        );
        $result = simplexml_load_string((string)$response->getBody());
        $result = json_decode(json_encode($result), true);
        return $result;
    }

    /**
     * get请求
     * @param string $url 接口相对路径
     * @param array $data 接口传参
     * @param array $headers HTTP Header
     * @return mixed
     * @throws GuzzleException
     */
    public function get($url, $data, $headers = [])
    {
        $request = new Request('GET', $url, $headers);
        $response = $this->client->send(
            $request,
            [
                'query' => $data,
            ]
        );
        $result = simplexml_load_string((string)$response->getBody());
        $result = json_decode(json_encode($result), true);
        return $result;
    }
}