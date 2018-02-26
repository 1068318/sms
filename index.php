<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------


// 定义应用目录
define('APP_PATH', __DIR__ . '/application/');

//define('BIND_MODULE', 'home');


// 支持事先使用静态方法设置Request对象和Config对象
// 执行应用并响应
//Container::get('app')->run()->send();

// 加载框架引导文件
require __DIR__ . '/../Framework/thinkphp/start.php';
