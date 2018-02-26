<?php
namespace app\home\api;

use app\common\controller\Base as Generic;
use think\facade\Request;
use think\facade\View;
use think\facade\Hook;
use app\home\model\CmrHeartBeat;
use app\home\model\CmrImage;

class Device extends Generic
{
	//设备管控首页
    public function index()
    {
		//$row = CmrHeartBeat::where(['id'=>4,'counts'=>55])->field(true)->find();
		//halt($row);//可以使用数组方式查询

		if (Request::has('ip', 'get')) {//点击左边设备
			$ip = Request::Param('ip');
			$mac = Request::Param('mac');
			
			$port = CmrHeartBeat::where('ip', $ip)->value('camera');

			foreach (['8081','8082','8083','8084'] as $val) {
				if (strpos($port, $val) !== false) {
					$data[$val] = 1;
				} else {
					$data[$val] = 0;
				}
			}

			View::share(['mac' => $mac, 'ip' => $ip, 'port' => $data]);
		}

		return view();
    }
	
	//ajax获取最新在线设备
	public function aliveDevice()
	{
		if (Request::isAjax()) {
			$rowset = CmrHeartBeat::where('take_time', '>=', Request::time()-ALIVE_TIME)->field('mac,ip,counts')->order('counts DESC')->select();

			return $rowset;
		}
	}

	//ajax轮询拍照
	public function takePhoto()
    {
		if (Request::isAjax()) {
			set_time_limit(60*2);
			$ipPort = Request::param('ip_port');
			$prefix = "http://$ipPort/?action=";

			//开始拍摄照片
			//send("{$prefix}snapshot");
		}
	}
	
	//ajax轮询下载
	public function downPhoto()
	{
		//file_put_contents('look.txt', '1'.PHP_EOL, FILE_APPEND);
		//拍摄完成之后开始下载图片//http://pic93.nipic.com/file/20160405/13287524_134949442440_2.jpg
		set_time_limit(60*2);
		$ipPort = Request::param('ip_port');
		$prefix = "http://$ipPort/?action=";
		
		//$info = download("{$prefix}download");
		/*if ($ipPort=='192.168.0.108:8081'){
			$url ='http://192.168.9.108/1.jpg';
		}
		else {$url ='http://pic93.nipic.com/file/20160405/13287524_134949442440_2.jpg';}
		$info = download($url);
		*/
		$urls = ['http://pic93.nipic.com/file/20160405/13287524_134949442440_2.jpg','http://pic97.huitu.com/res/20160724/976_20160724152045497500_1.jpg'];
		
		$keys = array_rand($urls);
		$info = download($urls[$keys]);
		
		
		if ($info['1']['http_code'] == 200) {
			if ($info['1']['content_type'] == 'image/jpeg') {
				$ext = '.jpg';
			} else if ($info['1']['content_type'] == 'image/png') {
				$ext = '.png';
			} else if ($info['1']['content_type'] == 'image/gif') {
				$ext = '.gif';
			}
			
			$date = date('Y-m');
			$name = date('YmdHis') . rand(10000,99999) . uniqid() . $ext;
			$dir = CAMERA_IMAGE_ROOT . '/' . $date;
			mkdirs($dir);
			file_put_contents($dir . '/' . $name, $info['0']);//下载文件
			
			//hook
			Hook::listen('thumb_image', ['dir' => $dir,'name' => $name]);
			/*
			$image = \think\Image::open($dir . '/' . $name);
			$image->thumb(config('site.width'), config('site.height'))->save($dir . '/' . 'thumb_' . $name);//生成缩略图,页面显示64张，所以搞小点
			*/
			$result = CmrImage::create(['image_path' => $date . '/' . $name]);//记录数据
			return ['path' => $date . '/' . $name];
		}
	}




}
