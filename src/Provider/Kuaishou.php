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
        $this->html = HttpClient::get($url);
        var_dump($this->html);
    }
    public function getData()
    {

    }
    public function getTitle()
    {
    }
    public function getImg()
    {
    }
    public function getUrl()
    {
    }
    public function getMusic()
    {
    }
}
