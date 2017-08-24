<?php
require './conf/const.php';
require './model/common.php';
require './model/fruit_model.php';

$err_msg=[];
$img_dir='img/';
try{
    if (isset ($_GET["information_id"])){
        $information_id=$_GET["information_id"];
    }
    if (isset ($_GET["category_id"])){
        $category_id=$_GET["category_id"];
    }
    if (isset ($_GET["search_name"])){
        $search_name=htmlspecialchars($_GET["search_name"],ENT_QUOTES,'UTF-8');
    }
    $dbh=get_db_connect();
    $list_category=get_list_category($dbh);
    $list_infomation=get_list_information($dbh);
    $list_item_information= get_item_information($dbh,$information_id);
    $list_item_product= get_item_product($dbh,$category_id,$search_name);
    $get_item_category=item_category($dbh,$category_id);
    if(trim($search_name)!=''){
        $result_search=get_list_search_name($dbh,$search_name);
    }
    }catch(Exception $e){
        $err_msg[]=$e->getMessage();
}

include_once './view/fruit_view.php';

?>