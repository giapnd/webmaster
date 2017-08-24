<?php
require './conf/const.php';
require './model/common.php';
require './model/finish_model.php';

$msg=[];
$img_dir='img/';
$create_datetime=date('Y-m-d h:m:i');
$a=0;
$b=0;
try{
    if(isset($_COOKIE['account_id'])){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $dbh=get_db_connect();
            if (isset($_POST['chb_cart'])) {
            foreach($_POST['chb_cart'] as $product_id) {
                $list_product_in_cart[]= get_cart_product($dbh,$product_id);
           }
        }
        if($list_product_in_cart==''){
            $msg='商品を選択してください。';
        }else{
            foreach ($list_product_in_cart as $key =>$read){
                foreach ($read as $i => $value) {
                    $account_id=$_COOKIE['account_id'];
                    $id=$value['id'];
                    $price=$value['price'];
                    $stock=$value['stock'];
                    $a=insert_item_cart($dbh,$account_id,$id,$price,$create_datetime,$a);
                    if ($stock >0){
                        $b=update_item_product($dbh,$id,$b);
                    }  
                }
            }
        $dbh->commit();
            }    
        }
    }else {
        header('Location: /fruitshop/fruit.php?');
        exit;
    }
}catch(Exception $e){
    $err_msg[]=$e->getMessage();
}

include_once './view/finish_view.php';
?>