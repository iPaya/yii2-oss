<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2016 ipaya.cn
 */

namespace iPaya\Yii2\AliyunOss;


use OSS\OssClient;
use yii\base\BaseObject;
use yii\base\InvalidConfigException;

class Client extends BaseObject
{
    /**
     * @var string
     */
    public $accessId;
    /**
     * @var string
     */
    public $accessKey;
    /**
     * @var string
     */
    public $endpoint;
    /**
     * @var string
     */
    public $bucket;

    /**
     * @var OssClient
     */
    private $_ossClient;

    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();
        if (null == $this->accessId) {
            throw new InvalidConfigException('You must set property "accessId".');
        }
        if (null == $this->accessKey) {
            throw new InvalidConfigException('You must set property "accessKey".');
        }
        if (null == $this->endpoint) {
            throw new InvalidConfigException('You must set property "endpoint".');
        }
        if (null == $this->bucket) {
            throw new InvalidConfigException('You must set property "bucket".');
        }
    }

    /**
     * @return OssClient
     * @throws \OSS\Core\OssException
     */
    public function getOssClient()
    {
        if ($this->_ossClient == null) {
            $this->_ossClient = new OssClient($this->accessId, $this->accessKey, $this->endpoint);
        }
        return $this->_ossClient;
    }
}
