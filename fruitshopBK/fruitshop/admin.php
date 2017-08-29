<?php
require './conf/const.php';
require './model/common.php';
require './model/admin_model.php';

$err_msg=[];
$img_dir='img/';
$message='';
try{
    if(isset($_COOKIE['permisions']) && $_COOKIE['permisions']==1){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $product_name=htmlspecialchars($_POST['product_name'],ENT_QUOTES,'UTF-8');
            $price=htmlspecialchars($_POST['price'],ENT_QUOTES,'UTF-8');
            $stock=htmlspecialchars($_POST['stock'],ENT_QUOTES,'UTF-8');
            $category=htmlspecialchars($_POST['category'],ENT_QUOTES,'UTF-8');
            $status=htmlspecialchars($_POST['status'],ENT_QUOTES,'UTF-8');
            $description=htmlspecialchars($_POST['description'],ENT_QUOTES,'UTF-8');
            $create_datetime=date('Y-m-d h:m:i');
            $new_img_filename='';
            $err_msg=[];
            $extension=pathinfo($_FILES['new_img']['name'],PATHINFO_EXTENSION);
            $exit_file=sha1(uniqid(mt_rand(),true)).'.'.$extension;
        }
        $err_msg=validation($product_name,$price,$stock,$category,$status,$description,$extension,$exit_file);
        $dbh=get_db_connect();
        if(($_SERVER['REQUEST_METHOD']==='POST') && count($err_msg)===0){
            $message=add_product($dbh,$product_name,$price,$stock,$category,$status,$description,$exit_file,$create_datetime);
            header('Location: /fruitshop/admin.php?');
        }
        if(isset($_GET['stock_change']) && $_SERVER['REQUEST_METHOD']==='GET'){
            if($_GET['stock_update']>=0) {
            $id_product=$_GET['id_product'];
            $stock_update=$_GET['stock_update'];
            $update_datetime=date('Y-m-d h:m:i');
            update_stock($dbh,$id_product,$stock_update,$update_datetime);
            } else {
            $err_stock ='在庫数は正の整数です。';
            }
        } 
        if(isset($_GET['status_change']) && $_SERVER['REQUEST_METHOD']==='GET'){
            $id_status=$_GET['id_status'];
            $status_change=$_GET['status_change'];
            $update_datetime=date('Y-m-d h:m:i');
            if($status_change==='公開→非公開'){
                 $status=0;
            }else{
                 $status=1;
            }
            update_status($dbh,$id_status, $status,$update_datetime);
        }
        $list_product=get_ds_product($dbh);
        $list_category=get_list_category($dbh);
    }else {
        header('Location: /fruitshop/login.php?');
        exit;
    }
}catch(Exception $e){
    $err_msg[]=$e->getMessage();
}

include_once './view/admin_view.php';

?>