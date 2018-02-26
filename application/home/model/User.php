<?php
namespace app\home\model;
use think\Model;

class User extends Model
{
	protected $pk			=	'id';
	protected $name         =   'cmr_user';

	protected function initialize()
	{
// 		parent::initialize();

// 		$this->hidden(['id']);
	}

	//password md5
	protected function setPasswdAttr($value)
	{
		return hash_secret($value);
	}





}