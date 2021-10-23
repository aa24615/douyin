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

use Php127\Douyin\Provider\Douyin;
use Php127\Douyin\Provider\KuaiShou;

/**
 * Factory.
 *
 * @package Php127\Douyin
 *
 * @method Douyin douyin(string $url)
 *
 * @author 读心印 <aa24615@qq.com>
 */


class Factory
{

    protected static $providers = [
        'douyin' => Douyin::class,
        'kuaishou' => KuaiShou::class
    ];

    /**
     * @param string $name
     * @param array  $config
     *
     */
    public static function make($name, $value)
    {
        return new self::$providers[$name]($value);
    }

    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}
