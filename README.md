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
$title           = NULL;     // optional, auto-generated as default
$publishKey      = NULL;     // optional, auto-generated as default
$publishSecurity = NULL;     // optional, can be "dynamic" or "static", "dynamic" as default

$stream = \PhalApi\DI()->qiniulive->hub->createStream($title, $publishKey, $publishSecurity); # => Stream Object
```

2.获取流列表
```php
$marker       = NULL;      // optional
$limit        = NULL;      // optional
$title_prefix = NULL;      // optional
$status       = NULL;      // optional, "connected" only

$result = \PhalApi\DI()->qiniulive->hub->listStreams($marker, $limit, $title_prefix, $status); # => Array
```


```php
// Get Stream
$stream = \PhalApi\DI()->qiniulive->hub->getStream($streamId); # => Stream Object
```
