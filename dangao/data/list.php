<?php
/**
* 分页显示所有的商品
*/
header('Content-Type: application/json;charset=UTF-8');
require_once('init.php');
@$kw = $_REQUEST['kw'];
if($kw=='null'){
	$kw=1;
}
//查询相应的产品
$sql = "SELECT * FROM xbk_product WHERE fid = $kw";
$result = mysqli_query($conn,$sql);
$list = mysqli_fetch_all($result,1);
$output['data'] = $list;
//输出数据
echo json_encode($output);  
