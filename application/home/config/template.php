<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 模板设置
// +----------------------------------------------------------------------
//echo Request::module();exit;
return [
    // 模板路径
    'view_path'    => APP_PATH . Request::module() . DS . 'template' . DS,

	'tpl_replace_string'       => [
        '__STATIC__'    => __ROOT__ . '/public/static',
        '__CSS__'       => __ROOT__ . '/public/static/css',
        '__JS__'        => __ROOT__ . '/public/static/js',
        '__IMAGES__'    => __ROOT__ . '/public/static/images',
    ],


];
