<?php

namespace Php127\Douyin\Analysis;

use Php127\Douyin\HttpClient\HttpClient;

class DouyinApi
{
    /**
     * 使用 tuanyougou.com 接口
     *
     * @param string $url
     *
     * @return string
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function tuanyougou(string $url)
    {
        $res = HttpClient::get('https://qqq.tuanyougou.com/app/index.php?i=4&t=0&v=2.0&from=wxapp&c=entry&a=wxapp&do=query&m=tommie_duanshiping&url='.urlencode($url));
        $arr = json_decode($res, true);
        return $arr['data']['downurl'] ?? '';
    }
}
