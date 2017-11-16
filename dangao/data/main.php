<?php
/**
* 接收客户端提交的登录信息：phone、pwd，执行登录验证；
* 返回表明登录成功或失败的JSON消息：
* 如：{"code":200, "msg":"check passed"}
*/
header('Content-Type: application/json;charset=UTF-8');
require_once('init.php');
$output=[
	'banner'=>[],
	'index'=>[],
	'top'=>[]
];
$sql = "SELECT * FROM xbk_main_banner";
$result = mysqli_query($conn,$sql);
$output['banner'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
$sql = "SELECT * FROM xbk_main_index";
$result = mysqli_query($conn,$sql);
$output['index'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
$sql = "SELECT * FROM xbk_main_top";
$result = mysqli_query($conn,$sql);
$output['top'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($output);