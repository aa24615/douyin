<?php

/*
 * This file is part of the php127/websiteinfo.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

define('TEST_ROOT', __DIR__);
define('STUBS_ROOT', __DIR__.'/stubs');

$_SERVER['HTTP_HOST'] = 'localhost';

include __DIR__.'/../vendor/autoload.php';
