<?php
require './conf/const.php';
require './model/common.php';
require './model/cart_model.php';

$msg=[];
$img_dir='img/';
try{
    if(isset($_COOKIE['account_id'])){
        $dbh=get_db_connect();
        $account_id=$_COOKIE['account_id'];
        $list_item_cart_of_account=get_list_item_cart($dbh,$account_id);
        $report_cart_of_account=report_cart($dbh,$account_id);
    }else {
        $msg='カートの商品を見るためログインしてください。';
    } 
} catch(Exception $e){
        $err_msg[]=$e->getMessage();
}

include_once './view/cart_view.php';
?>