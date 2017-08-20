<?php
require './conf/const.php';
require './model/common.php';
require './model/itemlist_model.php';

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
    $list_product=get_list_product($dbh);
    $list_category=get_list_category($dbh);
    $list_infomation=get_list_information($dbh);
    $list_item_information= get_item_information($dbh,$information_id);
    $list_item_category= get_item_category($dbh,$category_id);
    $get_item_category=item_category($dbh,$category_id);
    if(trim($search_name)!=''){
        $result_search=get_list_search_name($dbh,$search_name);
    }
    }catch(Exception $e){
        $err_msg[]=$e->getMessage();
}

include_once './view/itemlist_view.php';

?>