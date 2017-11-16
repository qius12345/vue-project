<?php
/**
* 接收客户端提交的登录信息：uname，执行用户名可用与否
*/
header('Content-Type: application/json;charset=UTF-8');
require_once('init.php');
@$uname = $_REQUEST['uname'];

$sql = "SELECT uid FROM xbk_user WHERE uname='$uname'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if(!$row){       
    echo('{"code":200, "msg":"用户名可用"}');
}else {     
	echo('{"code":201, "msg":"用户名已存在"}');
}