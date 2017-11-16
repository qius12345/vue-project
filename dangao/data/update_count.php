<?php
/**
* 修改购物车条目中的购买数量
*/
header('Content-Type: application/json;charset=UTF-8');
require_once('init.php');
@$pid = $_REQUEST['pid'];
@$count = $_REQUEST['count'];
if($count==0){
$sql = "UPDATE xbk_shoppingcart_item SET count=$count,checked='1' WHERE product_id=$pid";
$result = mysqli_query($conn, $sql);
	if($result){
	echo '{"code":200, "msg":"update succ"}';
	}
}else{
	$sql = "UPDATE xbk_shoppingcart_item SET count=$count,checked='0' WHERE product_id=$pid";
	$result = mysqli_query($conn, $sql);
	if($result){
	  echo '{"code":200, "msg":"update succ"}';
	}else {
	  echo '{"code":500, "msg":"update err"}';
	}
}
