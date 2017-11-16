<?php
/**
* 添加到购物车
*/
header('Content-Type: application/json;charset=UTF-8');
require_once('init.php');

@$pid = $_REQUEST['pid'];
@$uid = $_REQUEST['uid'];
@$buyCount = $_REQUEST['buyCount'];
if(!$buyCount){
    $buyCount=1;
}
$sql = "SELECT iid FROM xbk_shoppingcart_item WHERE user_id=$uid AND product_id=$pid";
$result = mysqli_query($conn, $sql);
if( mysqli_fetch_row($result) ){
  $sql = "UPDATE xbk_shoppingcart_item SET count=count+1,checked='0' WHERE user_id=$uid AND product_id=$pid";
}else {
  $sql = "INSERT INTO xbk_shoppingcart_item VALUES(NULL, $uid, $pid, $buyCount, 0)";
}
$result = mysqli_query($conn, $sql);
if($result){
  echo '{"code":200, "msg":"add succ"}';
}else {
  echo '{"code":500, "msg":"add err"}';
}
