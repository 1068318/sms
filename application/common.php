<?php

//\think\facade\Route::bind('module','home');

function send($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HEADER, false);

	//curl_setopt($ch, CURLOPT_POST, 1);
	//curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
	curl_setopt($ch, CURLOPT_TIMEOUT, 20);   //只需要设置一个秒的数量就可以
	$data = curl_exec($ch);
	curl_close($ch);
}


function hash_secret($value)
{
    $sKey = config('site.s_key');
    return md5(sha1($value . $sKey) . $sKey);
}

function mkdirs($dir, $mode = 0777)
{
	if (!is_dir($dir)) {
		mkdirs(dirname($dir), $mode);
		return mkdir($dir, $mode);
	}
	return true;
}

function rmdirs($dir)
{
	$dir = realpath($dir);
	if ($dir == '' || $dir == '/' ||
			(strlen($dir) == 3 && substr($dir, 1) == ':\\'))
	{
		// 禁止删除根目录
		return false;
	}

	// 遍历目录，删除所有文件和子目录
	if(false !== ($dh = opendir($dir))) {
		while(false !== ($file = readdir($dh))) {
			if($file == '.' || $file == '..') { continue; }
			$path = $dir . DIRECTORY_SEPARATOR . $file;
			if (is_dir($path)) {
				if (!rmdirs($path)) { return false; }
			} else {
				unlink($path);
			}
		}
		closedir($dh);
		rmdir($dir);
		return true;
	} else {
		return false;
	}
}



function http($url,$data,$headers)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	
	
	$data = json_encode($data);

	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120);
	curl_setopt($ch, CURLOPT_TIMEOUT, 120);   //只需要设置一个秒的数量就可以
	$data1 = curl_exec($ch);
	halt($data1);
	$errorno = curl_errno($ch);
	halt(array('errorno' => false, 'errmsg' => $errorno));
	curl_close($ch);
}


function sha256($data, $rawOutput=true)
{
		if (!is_scalar($data)){
				return false;
		}
		$data = (string)$data;
		$rawOutput = !!$rawOutput;
		return hash('sha256', $data, $rawOutput);
}