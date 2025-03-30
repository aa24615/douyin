<?php

namespace Php127\Tests\Provider;

use Php127\Douyin\Provider\Douyin;
use PHPUnit\Framework\TestCase;

class DouyinTest extends TestCase
{
    protected $url;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->url = 'https://v.douyin.com/dj4UA2x/';
    }

    public function testGetDataImage()
    {
        $app = new Douyin('https://v.douyin.com/RNc2a-ji1o4/');
        $data = $app->getImages();


        $this->assertTrue(count($data)>0);
    }


    public function testGetData()
    {
        $app = new Douyin($this->url);
        $data = $app->getData();


        var_dump($data);
        $this->assertTrue(!empty($data['url']));
        $this->assertTrue(!empty($data['img']));
        $this->assertTrue(!empty($data['music']));
        $this->assertTrue(!empty($data['title']));
    }

    public function testGetData2()
    {
        $app = new Douyin('https://v.douyin.com/rv4LF76/');
        $data = $app->getData();

        $this->assertTrue(count($data)>0);
    }

    public function testGetTitle()
    {
        $app = new Douyin($this->url);
        $this->assertTrue(!empty($app->getTitle()));
    }

    public function testGetUrl()
    {
        $app = new Douyin($this->url);
        $this->assertTrue(!empty($app->getUrl()));
    }

    public function testGetImg()
    {
        $app = new Douyin($this->url);
        $this->assertTrue(!empty($app->getImg()));
    }

    public function testGetMusic()
    {
        $app = new Douyin($this->url);
        $this->assertTrue(!empty($app->getMusic()));
    }
}
