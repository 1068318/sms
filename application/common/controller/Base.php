<?php
namespace app\common\controller;
use think\Controller;

class Base extends Controller
{
	protected function initialize()
	{
 		//$this->authVerifyDeny();
	}

	public function authVerifyDeny()
	{
		if (!session('?userinfo')) {
			//$this->redirect('user/login');
		}
	}

	public function authVerifySure()
	{
		if (session('?userinfo')) {
		//	$this->redirect('index/index');
		}
	}


}
