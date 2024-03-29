<?php

/*
 * This file is part of the php127/douyin.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Php127\Douyin;

/**
 * Interface ProviderInterface
 * @package Php127\Douyin
 */
interface ProviderInterface
{
    public function setUrl(string $url);
    public function getData();
    public function getTitle();
    public function getImg();
    public function getUrl();
    public function getMusic();
}
