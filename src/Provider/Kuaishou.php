<?php

namespace Php127\Douyin\Provider;

use Php127\Douyin\HttpClient\HttpClient;
use Php127\Douyin\ProviderInterface;

/**
 * Class Kuaishou.
 *
 * @package Php127\Douyin\Provider
 *
 * @author 读心印 <aa24615@qq.com>
 */
class Kuaishou implements ProviderInterface
{
    public $html = null;
    public $data = null;
    public $url = null;

    public function __construct(string $url)
    {
        $this->setUrl($url);
        return $this;
    }


    public function setUrl(string $url)
    {
        $this->url = $url;

        $options = [
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.25 Mobile Safari/537.36',
                'Cookie' => 'did=web_e19cfe96787746a5b4311f56acaf5be4; didv=1593660908000; clientid=3; client_key=65890b29; Hm_lvt_86a27b7db2c5c0ae37fee4a8a35033ee=1594966818,1595649199; sid=6281151b7052a88cfaba3a43'
            ]
        ];

        $this->html = HttpClient::get($url, $options);


        preg_match('/window\.pageData= ([\s\S]*?)<\/script>/i', $this->html, $matches);

        $this->data = json_decode($matches[1] ?? '', true);
    }
    public function getData()
    {
        return [
            'title' => $this->getTitle(),
            'url' => $this->getUrl(),
            'img' => $this->getImg(),
            'music' => $this->getMusic(),
        ];
    }
    public function getTitle()
    {
        return $this->data['video']['caption'] ?? '';
    }
    public function getImg()
    {
        return $this->data['video']['poster'] ?? '';
    }
    public function getUrl()
    {
        return $this->data['video']['srcNoMark'] ?? '';
    }
    public function getMusic()
    {
        return $this->data['rawPhoto']['music']['url'] ?? '';
    }
}
