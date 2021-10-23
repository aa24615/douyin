<?php

namespace Php127\Douyin\Provider\Duoyin;

use Php127\Douyin\HttpClient\HttpClient;

/**
 * 使用 tuanyougou.com 接口.
 *
 * @package Php127\Douyin\Provider\Duoyin
 *
 * @author 读心印 <aa24615@qq.com>
 */
class TuanYouGou
{
    /**
     * getUrl.
     *
     * @param string $url
     *
     * @return string
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function getUrl(string $url)
    {
        $res = HttpClient::get('https://qqq.tuanyougou.com/app/index.php?i=4&t=0&v=2.0&from=wxapp&c=entry&a=wxapp&do=query&m=tommie_duanshiping&url='.urlencode($url));
        $arr = json_decode($res, true);
        return $arr['data']['downurl'] ?? '';
    }
}
