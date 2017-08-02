<?php
require './conf/setting.php';
require './model/model.php';

$goods_data=[];
$err_msg=[];

try{
    $dbh=get_db_connect();
    $goods_data=get_goods_table_list($dbh);
    $goods_data=price_before_tax_assoc_array($goods_data);
    $goods_data=entity_assoc_array($goods_data);
}catch(Exception $e){
    $err_msg[]=$e->getMessage();
}

include_once './view/view.php';

?>