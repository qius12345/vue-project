<?php
/**
* 接收客户端提交的登录信息：phone、pwd，执行登录验证；
* 返回表明登录成功或失败的JSON消息：
* 如：{"code":200, "msg":"check passed"}
*/
header('Content-Type: application/json;charset=UTF-8');
require_once('init.php');
@$phone = $_REQUEST['phone'];
@$upwd = $_REQUEST['upwd'];

$sql = "SELECT uid FROM xbk_user WHERE phone='".$phone."' AND upwd='".$upwd."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if(!$row){        //用户名或密码错误
    echo('{"code":201, "msg":"uname or upwd err"}');
}else {           //登录成功
   $uid = $row['uid'];
   $output=['code'=>200,'uid'=>$uid];
   echo json_encode($output);
}