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

use Php127\Douyin\Analysis\Douyin;

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
    /**
     * @param string $name
     * @param array  $config
     *
     */
    public static function make($name, $value)
    {
        $namespace = ucfirst($name);

        $application = "\\Php127\\Douyin\\Analysis\\{$namespace}";

        return new $application($value);
    }

    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}
