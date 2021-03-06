<?php
require './conf/const.php';
require './model/common.php';
require './model/cart_model.php';

$msg=[];
$img_dir='img/';
$create_datetime=date('Y-m-d h:m:i');
$a=0;
$b=0;
$sum_money=0;
try{
    if($_SERVER['REQUEST_METHOD']==='POST'){
        session_start();
        if(isset($_SESSION['click'])) {
            $_SESSION['click'] = $_SESSION['click']+ 1;
        }else{ 
            $_SESSION['click'] = 1;
        }
        // echo "click = ". $_SESSION['click'];
        $dbh=get_db_connect();
        if (isset($_POST['chb_cart'])) {
            
        foreach($_POST['chb_cart'] as $product_id) {
            $list_product_in_cart[]= get_cart_product($dbh,$product_id);
            $check=get_cart_product($dbh,$product_id);
       }
       $count_product=count($list_product_in_cart);
    //}
    // if($_SESSION['click'] >=2){
    //     $msg='重複クリックしております。';
    // } else{
        if(count($check)==0){
            $msg='商品を選択してください。';
        }else{
            if(isset($_POST['btn_buy'])){
                foreach ($list_product_in_cart as $key =>$read){
                    foreach ($read as $i => $value) {
                        $account_id=$_COOKIE['account_id'];
                        $id=$value['id'];
                        $price=$value['price'];
                        $stock=$value['stock'];
                        if ($stock >0 && $_SESSION['click']==1){
                            $a=insert_item_cart($dbh,$account_id,$id,$price,$create_datetime,$a);
                            $b=update_item_product($dbh,$id,$b);
                        }
                        $sum_money=$sum_money+$value['price'];
                    }
                }
        $dbh->commit();                
            }
        }
    }else{
        $msg='商品を選択してください。';
        }      
    }
}catch(Exception $e){
    $err_msg[]=$e->getMessage();
}

include_once './view/cart_view.php';
?>