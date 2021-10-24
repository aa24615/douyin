<?php

namespace Php127\Tests;

use Php127\Douyin\Factory;
use Php127\Douyin\Provider\Douyin;
use Php127\Douyin\Provider\Kuaishou;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    public function testDouyin()
    {
        $app = Factory::douyin('https://v.douyin.com/RJAGV9g/');

        $this->assertInstanceOf(Douyin::class, $app);

        $data = $app->getData();

        $this->assertTrue(!empty($data['url']));
        $this->assertTrue(!empty($data['img']));
        $this->assertTrue(!empty($data['music']));
        $this->assertTrue(!empty($data['title']));
    }

    public function testKuaishou()
    {
        $app = Factory::kuaishou('http://www.baidu.com');

        $this->assertInstanceOf(Kuaishou::class, $app);
    }
}
