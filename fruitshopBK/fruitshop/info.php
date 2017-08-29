<?php
require './conf/const.php';
require './model/common.php';
require './model/info_model.php';

$err_msg=[];
$img_dir='img/';
$create_datetime=date('Y-m-d h:m:i');
try{
    if (isset ($_GET["information_id"])){
        $information_id=$_GET["information_id"];
    }
    if (isset ($_GET["product_id"])){
        $product_id=htmlspecialchars($_GET["product_id"],ENT_QUOTES,'UTF-8');
    }
    $dbh=get_db_connect();
    $list_infomation=get_list_information($dbh);
    $list_product_info= get_cart_product($dbh,$product_id);
    $list_comment_product=list_comment_product($dbh,$product_id);
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if (trim($_POST['comment'])!=''){
            $comment=htmlspecialchars($_POST['comment'],ENT_QUOTES,'UTF-8');
            $user_id=$_COOKIE['account_id'];
            $msg=insert_comment_product($dbh,$user_id,$product_id,$comment,$create_datetime);
            header('Location: /fruitshop/info.php?product_id='.$product_id);
            exit;
        }else {
            $msg='コメントしてください。';
        }

    }
    }catch(Exception $e){
        $err_msg[]=$e->getMessage();
}

include_once './view/info_view.php';

?>