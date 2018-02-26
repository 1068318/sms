<?php
namespace app\home\behavior;

class ImageThumb
{
	public function run($params)
	{
		$image = \think\Image::open($params['dir'] . '/' . $params['name']);
		$image->thumb(config('site.width'), config('site.height'))->save($params['dir'] . '/' . 'thumb_' . $params['name']);//生成缩略图
	}






}