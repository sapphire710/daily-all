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

// [ 应用入口文件 ]

//跨域：协议 域名 端口号
//1、解决跨域问题
//2、jsonp：动态插入script  src
//3、代理
//4、服务器

header("Access-Control-Allow-Origin:*");
header('Access-Control-Allow-Headers:content-type');
if ($_SERVER['REQUEST_METHOD']==='OPTIONS'){
    exit();
}


// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
