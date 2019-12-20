<?php
namespace Coomm\Qiniucloud;

require(join(DIRECTORY_SEPARATOR, array(dirname(dirname(__FILE__)), 'src/lib', 'Pili.php')));

class Lite {
	//accessKey
	private $accessKey="";
	//secretKey
	private $secretKey="";
	//直播空间
	private $hubname="";
	//hub对象
	public $hub;
	/**
     * SMS_Lite 构造方法初始化配置
     *
     * @param  $cofAddress string 配置文件地址
     * @param  $debug      bool   是否开启调试模式
     */
    public function __construct($config = null) {
        

        if ($config === NULL) {
            //获得配置项
            $config = \PhalApi\DI()->config->get('app.Qiniu');
			$this->accessKey=$config['accessKey'];
			$this->secretKey=$config['secretKey'];
			$this->hubname=$config['hubname'];
        }

        // Instantiate an Hub object
		$credentials = new \Qiniu\Credentials($this->accessKey, $this->secretKey); #=> Credentials Object
		$this->hub = new \Pili\Hub($credentials, $this->hubname); # => Hub Object
    }  
	
}