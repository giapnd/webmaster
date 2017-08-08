<?php
require './conf/const.php';
require './model/function.php';

$err_msg=[];
$img_dir='img/';
$message='';
try{
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $drink_name=htmlspecialchars($_POST['drink_name'],ENT_QUOTES,'UTF-8');
        $price=$_POST['price'];
        $stock=$_POST['stock'];
        $status=$_POST['status'];
        $create_datetime=date('Y/m/d h:m:i');
        $new_img_filename='';
        $err_msg=[];
        $extension=pathinfo($_FILES['new_img']['name'],PATHINFO_EXTENSION);
        $exit_file=sha1(uniqid(mt_rand(),true)).'.'.$extension;
    }
    $err_msg=validation($drink_name,$price,$stock,$status,$extension,$exit_file);
    $dbh=get_db_connect();
    if(($_SERVER['REQUEST_METHOD']==='POST') && count($err_msg)===0){
        $message=add_drink_table($dbh,$drink_name,$price,$stock,$status,$exit_file,$create_datetime);
         //print $message;
    }
    if(isset($_GET['stock_change']) && $_SERVER['REQUEST_METHOD']==='GET'){
        $id_stock=$_GET['id_stock'];
        $stock_update=$_GET['stock_update'];
        $update_datetime=date('Y-m-d h:m:i');
        update_stock_table($dbh,$id_stock,$stock_update,$update_datetime);
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
    $list_drink=get_list_drink($dbh);
    }catch(Exception $e){
        $err_msg[]=$e->getMessage();
}

include_once './view/tool.php';

?>