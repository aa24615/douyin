<?php

namespace Php127\Douyin\Analysis;

use Php127\Douyin\HttpClient\HttpClient;

class DouyinApi
{
    /**
     * 使用 mp.lmengcity.com 接口
     *
     * @param string $url
     *
     * @return string
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function lmengcity(string $url)
    {
        $data = ['url' => $url];
        $res = HttpClient::postJson('https://mp.lmengcity.com/mp-7/watermark/dy/', $data);
        $arr = json_decode($res, true);
        return $arr['mp4'] ?? '';
    }
}
