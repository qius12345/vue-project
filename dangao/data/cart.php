<?php
/**
* Ʒ
*/
header('Content-Type: application/json;charset=UTF-8');
require_once('init.php');
@$uid = $_REQUEST['uid'];
//查询该用户的购物车
$sql = "SELECT product_id,count FROM xbk_shoppingcart_item WHERE user_id = $uid AND checked=0";
$result = mysqli_query($conn,$sql);
$list = mysqli_fetch_all($result,MYSQLI_ASSOC);
$output = $list;
//查询商品的图片等
for($i=0;$i<count($output);$i++){
	$pid = $output[$i]['product_id'];
	$sql = "SELECT price, dsize FROM xbk_product_detail WHERE pid = $pid";
	$result = mysqli_query($conn,$sql);
	$price = mysqli_fetch_assoc($result)['price'];
	$output[$i]['price']=$price;
	$dsize = mysqli_fetch_assoc($result)['dsize'];
	$output[$i]['dsize']=$dsize;
	$sql = "SELECT pic FROM xbk_product WHERE pid = $pid";
	$result = mysqli_query($conn,$sql);
	$pic = mysqli_fetch_row($result)[0];
	$pic==null? $list='null.png':$pic=$pic;
	$output[$i]['pic']=$pic;
	$sql = "SELECT pename,pname FROM xbk_product WHERE pid = $pid";
	$result = mysqli_query($conn,$sql);
	$list = mysqli_fetch_assoc($result);
	$pename = $list['pename'];
	$output[$i]['pename']=$pename;
	$pname  = $list['pname'];
	$output[$i]['pname']=$pname;
}
echo json_encode($output);

