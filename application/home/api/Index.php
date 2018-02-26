<?php
namespace app\home\api;

use app\common\controller\Base as Generic;

class Index extends Generic
{

	//网站登陆后首页
    public function index()
    {
/*
		ini_set('display_errors', true);
		error_reporting(E_ALL);
		try {
			echo asdfasdf(); //未定义的函数
		} catch (Exception $e) {
			echo 'Exception';
		} catch (Error $e) { 
			echo 'Error';
		}
		echo 5555;
		exit;
		output:error和5555
*/

		set_time_limit(0);
		$data = [
			'from'=>'1065752611132025',
			'templateId'=>'VSMS00001737',
			'notifyUrl'=>'http://www.baidu.com',
			'userInfos'=>[
				['to'=>'8618226701287']
			]
		];

	$notice = '';
	$random = [ '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
	'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l',
	'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x',
	'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
	'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V',
	'W', 'X', 'Y', 'Z' ];

	
	//$length = count($random);
	for($i=0;$i<25;$i++)
	{
		$key = array_rand($random,1);
		$notice .= $random[$key];
	}

	//北京时间减掉8小时
	$created =  date('Y-m-d\TH:i:s\Z', time()-8*3600);

	$password = 'e43e20799fe3d682';

	$PasswordDigest = base64_encode(sha256($notice.$created.$password));
	//halt($PasswordDigest);
/*
	$headers = array(
		"application/json:charset=UTF-8",
		"Content-Type:application/json;charset=UTF-8",
		"Authorization:WSSE realm='SDP',profile='UsernameToken',type='Appkey'",
		"X-WSSE:UsernameToken Username='524ba2c3a42543cca0f48ccca93861b6',PasswordDigest='$PasswordDigest',Nonce='$notice',Created='$created'"
	);
*/
	$headers = [
		"Accept-Encoding: none",
		"Content-Type:application/json;charset=UTF-8", 
		'Content-Length:' . strlen(json_encode($data)),
		"Authorization: WSSE realm='SDP', profile='UsernameToken', type='Appkey'", 
		"X-WSSE:UsernameToken Username='9c52b5d6385f4d73ba4ca91e104e84ad',PasswordDigest='{$PasswordDigest}', Nonce='{$notice}', Created='{$created}'"
	];

	//halt($headers);

	$url = 'http://aep.api.cmccopen.cn/vsms/send/v1';

	http($url,$data,$headers);
}




}
