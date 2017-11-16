<?php
/**
* 接收客户端
*/
header('Content-Type: application/json;charset=UTF-8');

@$uname = $_REQUEST['uname'];
@$upwd = $_REQUEST['upwd'] ;
@$phone = $_REQUEST['phone'] ;

require_once('init.php');
$sql = "INSERT INTO xbk_user(uname,upwd,phone) VALUES('$uname','$upwd','$phone')";
$result = mysqli_query($conn,$sql);

if(!$result){
  echo('{"code":500, "msg":"db execute err"}');
}else {
  $uid = mysqli_insert_id($conn);
  echo('{"code":200, "msg":"register succ", "uid":'.$uid.'}');
}