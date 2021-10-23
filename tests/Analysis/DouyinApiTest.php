<?php

namespace Analysis;

use Php127\Douyin\Analysis\DouyinApi;
use PHPUnit\Framework\TestCase;

class DouyinApiTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->url = 'https://v.douyin.com/RJAGV9g/';
    }

    public function testGetData()
    {
        $res = DouyinApi::tuanyougou($this->url);
        print_r($res);
        $this->assertTrue(!empty($res));
    }
}
