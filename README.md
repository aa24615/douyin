

# php127/douyin

已实现

- [x] 获取无水印视频链接
- [x] 获取图片封面
- [x] 获取视频音乐
- [x] 获取视频标题

支持平台

- [x] 抖音
- [x] 快手


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

//抖音
$app = Factory::douyin('https://v.Douyin.com/eeYy4Yo/');

//快手
$app = Factory::kuaishou('https://v.kuaishou.com/gcNIRW');
```

获取所有信息

```php
$app->getData();

/*
Array
(
    [title] => “如果风会说话，不知道他会不会告诉你，我一直在想你”#三月你好
    [url] => https://aweme.snssdk.com/aweme/v1/playwm/?video_id=v0d00ff90000c0u6h388f47ar50b7ssg&ratio=720p&line=0
    [img] => https://p29.Douyinpic.com/tos-cn-p-0015/dab756097b094853bbffb9b744aa246a_1614571698~tplv-dy-360p.jpeg?from=2563711402
    [music] => https://sf6-cdn-tos.Douyinstatic.com/obj/ies-music/6934532600002284296.mp3
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
$app->setUrl(string $url = 'https://v.Douyin.com/eeYy4Yo/');
$app->getData();
//...
```

## 参与贡献

1. fork 当前库到你的名下
3. 在你的本地修改完成审阅过后提交到你的仓库
4. 提交 PR 并描述你的修改，等待合并

## License

[MIT license](https://opensource.org/licenses/MIT)
