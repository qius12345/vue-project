<?php
/**
* 接收客户端提交的登录信息：uname，执行用户名可用与否
*/
header('Content-Type: application/json;charset=UTF-8');
require_once('init.php');
@$phone = $_REQUEST['phone'];

$sql = "SELECT uid FROM xbk_user WHERE phone='$phone'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if(!$row){       
    echo('{"code":200, "msg":"电话号码可用"}');
}else {     
	echo('{"code":201, "msg":"电话号码已使用"}');
}