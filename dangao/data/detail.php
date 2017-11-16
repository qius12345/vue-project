<?php
/**
* ��ҳ��ʾ���е���Ʒ
*/
header('Content-Type: application/json;charset=UTF-8');
require_once('init.php');
@$pid = $_REQUEST['pid'];
//��ѯ��Ӧ�Ĳ�Ʒ
$sql = "SELECT * FROM xbk_product WHERE pid = $pid";
$result = mysqli_query($conn,$sql);
$list = mysqli_fetch_assoc($result);
$output['detail'] = $list;
//查询商品的size等
$sql = "SELECT * FROM xbk_product_detail WHERE pid = $pid";
$result = mysqli_query($conn,$sql);
$sizeList = mysqli_fetch_all($result,MYSQLI_ASSOC);
$output['sizeList'] = $sizeList;
echo json_encode($output);  
