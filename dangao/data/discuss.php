<?php
/**
* 接收客户端提交的登录信息：phone、pwd，执行登录验证；
* 返回表明登录成功或失败的JSON消息：
* 如：{"code":200, "msg":"check passed"}
*/
header('Content-Type: application/json;charset=UTF-8');
require_once('init.php');
$sql = "SELECT * FROM xbk_discuss";
$result = mysqli_query($conn,$sql);
$output = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($output);