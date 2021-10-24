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
use Php127\Douyin\Provider\Kuaishou;

/**
 * Factory.
 *
 * @package Php127\Douyin
 *
 * @method Douyin douyin(string $url)
 * @method Kuaishou kuaishou(string $url)
 *
 * @author 读心印 <aa24615@qq.com>
 */


class Factory
{
    protected static $providers = [
        'douyin' => Douyin::class,
        'kuaishou' => Kuaishou::class
    ];

    /**
     * @param string $name
     * @param string $value
     *
     * @return ProviderInterface
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function make(string $name, string $value)
    {
        return new self::$providers[$name]($value);
    }

    /**
     * __callStatic.
     *
     * @param static $name
     * @param array $arguments
     *
     * @return Factory|ProviderInterface
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function __callStatic(string $name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}
