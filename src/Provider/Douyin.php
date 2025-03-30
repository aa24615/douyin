<?php

/*
 * This file is part of the php127/douyin.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Php127\Douyin\Provider;

use Php127\Douyin\HttpClient\DouyinHttpClient;
use Php127\Douyin\HttpClient\HttpClient;
use Php127\Douyin\ProviderInterface;

/**
 * Douyin.
 *
 * @package Php127\Douyin\Analysis
 *
 * @author 读心印 <aa24615@qq.com>
 */
class Douyin implements ProviderInterface
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
        $this->data = $this->getDouyin();
    }

    private function getContents(string $url){
        stream_context_set_default( [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ]);
        $header = get_headers($url,1);
        $location = $header['Location'][0];

        $explode = explode('/',$location);
        $id = $explode[5];

        $body = HttpClient::get('https://www.iesdouyin.com/share/video/'.$id);
        $pattern = '/window\._ROUTER_DATA\s*=\s*(.*?)\<\/script>/s';

        preg_match($pattern, $body, $matches);
        return trim($matches[1]);
    }


    private function getDouyin()
    {
        if (is_null($this->data)) {
            $this->html = $this->getContents($this->url);
//            var_dump($this->html);
            $this->data = json_decode($this->html, true);

            //print_r($this->data);
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
            'image' => $this->getImages()
        ];
    }

    public function getMusic()
    {
        $this->getDouyin();
        return $this->data['loaderData']['video_(id)/page']['videoInfoRes']['item_list'][0]['music']['cover_large']['url_list'][0] ?? '';
    }

    public function getImg()
    {
        $this->getDouyin();
        return $this->data['loaderData']['video_(id)/page']['videoInfoRes']['item_list'][0]['video']['cover']['url_list'][0] ?? '';
    }
    public function getTitle()
    {
        $this->getDouyin();
        return $this->data['loaderData']['video_(id)/page']['videoInfoRes']['item_list'][0]['desc'] ?? '';
    }

    public function getUrl()
    {
        $this->getDouyin();

        $link = $this->data['loaderData']['video_(id)/page']['videoInfoRes']['item_list'][0]['video']['play_addr']['url_list'][0] ?? "";

        $link = str_replace('playwm', 'play',$link);

        return $link;
    }

    public function getRaw(){
        return json_encode($this->data);
    }

    public function getHtml(){
        return $this->html;
    }

    public function getImages(){
        $this->getDouyin();

        $data = [];

        $list = $this->data['loaderData']['video_(id)/page']['videoInfoRes']['item_list'][0]['images'] ?? [];
        foreach ($list as $val){
            $data[] = $val['url_list'][0];
        }

        return $data;
    }
}
