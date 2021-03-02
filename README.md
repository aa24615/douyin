

# php127/douyin

抖音去水印

- 获取抖音无水印视频链接
- 获取抖音图片封面
- 获取抖音视频音乐
- 获取抖音视频标题

## 要求

1. php >= 7.3
2. Composer

## 安装

```shell
composer require php127/douyin -vvv
```
## 用法

```php
use Php127\Douyin\Factory;;

$app = Factory::douyin('https://v.douyin.com/eeYy4Yo/');
```

获取所有信息

```php
$app->getData();

/*
Array
(
    [title] => “如果风会说话，不知道他会不会告诉你，我一直在想你”#三月你好
    [url] => https://aweme.snssdk.com/aweme/v1/playwm/?video_id=v0d00ff90000c0u6h388f47ar50b7ssg&ratio=720p&line=0
    [img] => https://p29.douyinpic.com/tos-cn-p-0015/dab756097b094853bbffb9b744aa246a_1614571698~tplv-dy-360p.jpeg?from=2563711402
    [music] => https://sf6-cdn-tos.douyinstatic.com/obj/ies-music/6934532600002284296.mp3
)
*/
```

单个获取

```php
//获取title
$app->getTitle();

//获取img
$app->getImg();

//获取music
$app->getMusic();

//获取无水印url
$app->getUrl();

```

重新设置url

```php
$app->setUrl(string $url = 'https://v.douyin.com/eeYy4Yo/');
$app->getData();
//...
```

## 参与贡献

1. fork 当前库到你的名下
3. 在你的本地修改完成审阅过后提交到你的仓库
4. 提交 PR 并描述你的修改，等待合并
> 注: 本项目同时发布在gitee 请使用github提交      
> github: https://github.com/aa24615/douyin

## License

[MIT license](https://opensource.org/licenses/MIT)
