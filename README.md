# 七牛云直播扩展


## 安装和配置
修改项目下的composer.json文件，并添加：  
```
    "coomm/qiniucloud":"dev-master"
```

然后执行```composer update```。
## 配置
在vendor/coomm/qiniucloud/src/Lite.php修改短信配置
```php

```
## 注册
在/path/to/phalapi/config/di.php文件中，注册：  
```php
$di->qiniulive = function() {
	return new \Coomm\Qiniucloud\Lite();
};
```

## 使用
1. 创建流
```php
// Create a new Stream
$stream = \PhalApi\DI()->qiniulive->hub->createStream($streamName); # => Stream Object
```

2.获取流列表
```php
$result = \PhalApi\DI()->qiniulive->hub->listStreams(); # => Array
```

3.获取流
```php
// Get Stream
$streamId = $stream->id;
$stream = \PhalApi\DI()->qiniulive->hub->getStream($streamId); # => Stream Object
```
4.更新流
```php
// Get Stream
$stream->disabled        = true/false; 
$stream = $stream->update(); # => Stream Object
```
5.禁用流
```php
// Disable a Stream
$disabledTill = time() + 10; # disabled in 10s from now
$result = $stream->disable($disabledTill); # => NULL
```

6.启用流
```php
// enable a Stream
$result = $stream->enable(); # => NULL
```

7.获取流状态
```php
// Get Stream status
$result = $stream->status(); # => Array
```
8.删除流
```php
// Delete a Stream
$result = $stream->delete(); # => NULL
```

9.获取推拉流地址
```php
// Generate RTMP publish URL
$publishUrl = $stream->rtmpPublishUrl();

// Generate RTMP live play URLs
$urls = $stream->rtmpLiveUrls();

// Generate HLS play URLs
$urls = $stream->hlsLiveUrls();

// Generate Http-Flv live play URLs
$urls = $stream->httpFlvLiveUrls();

// Generate HLS playback URLs
$start     = -1;  // optional, in second, unix timestamp
$end       = -1;  // optional, in second, unix timestamp
$urls = $stream->hlsPlaybackUrls($start, $end);
```
10.保存流到文件
```php
// Save Stream as a file
 $result = $stream->saveAs($filename);
 ```


更多请参考官方文档