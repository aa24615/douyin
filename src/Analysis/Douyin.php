<?php

/*
 * This file is part of the php127/douyin.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Php127\Douyin\Analysis;

use Php127\Douyin\HttpClient\DouyinHttpClient;

/**
 * Douyin.
 *
 * @package Php127\Douyin\Analysis
 *
 * @author 读心印 <aa24615@qq.com>
 */
class Douyin implements AnalysisInterface
{
    public $html = null;
    public $data = null;

    public function __construct(string $url)
    {
        $this->setUrl($url);
        return $this;
    }


    public function setUrl(string $url)
    {
        $this->html = DouyinHttpClient::get($url);
        $this->data = $this->getDouyin();
    }

    private function getVideoId()
    {
        preg_match('/href="(.*?)">Found/', $this->html, $matches);
        $url_share = $matches[1] ?? '';
        preg_match('/video\/(.*?)\//', $url_share, $matches);

        return $matches[1] ?? '';
    }

    private function getDouyin()
    {
        if (is_null($this->data)) {
            $videoId = $this->getVideoId();
            $json = DouyinHttpClient::get("https://www.iesdouyin.com/web/api/v2/aweme/iteminfo/?item_ids=".$videoId);
            $this->data = json_decode($json, true);
        }

        return $this->data;
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

    public function getMusic()
    {
        $this->getDouyin();
        return $this->data['item_list'][0]['music']['play_url']['url_list'][0] ?? '';
    }

    public function getImg()
    {
        $this->getDouyin();
        return $this->data['item_list'][0]['video']['origin_cover']['url_list'][0] ?? '';
    }
    public function getTitle()
    {
        $this->getDouyin();
        return $this->data['item_list'][0]['desc'] ?? '';
    }

    public function getUrl()
    {
        $this->getDouyin();
        return $this->data['item_list'][0]["video"]["play_addr"]["url_list"][0] ?? '';
    }
}
