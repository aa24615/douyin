<?php
/*
 * This file is part of the php127/douyin.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Php127\Douyin\HttpClient;

/**
 * DouyinHttpClient.
 *
 * @package Php127\Douyin\HttpClient
 *
 * @author 读心印 <aa24615@qq.com>
 */
class DouyinHttpClient implements HttpClientInterface
{
    public static function get(string $url)
    {
        $Header = array("User-Agent:Mozilla/5.0 (Linux; U; Android 2.2; en-us; Nexus One Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1");
        $con = curl_init($url);
        curl_setopt($con, CURLOPT_HEADER, false); # 启用时会将头文件的信息作为数据流输出。
        curl_setopt($con, CURLOPT_SSL_VERIFYPEER, false); # 禁用后cURL将终止从服务端进行验证。
        curl_setopt($con, CURLOPT_RETURNTRANSFER, true); # 将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($con, CURLOPT_HTTPHEADER, $Header); # 用来设置HTTP头字段的数组
        curl_setopt($con, CURLOPT_TIMEOUT, 5000); # 设置cURL允许执行的最长秒数。
        $result = curl_exec($con); # 抓取URL并把它传递给浏览器
        curl_close($con); # //关闭cURL资源，并且释放系统资源
        return $result;
    }
}
