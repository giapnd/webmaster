<?php
require './conf/const.php';
require './model/common.php';
require './model/cart_model.php';


$err_msg=[];
$img_dir='img/';
$message='';
$c=0;
$d=0;
$e=0;
$f=0;
$g=0;
$j=0;
$create_datetime=date('Y-m-d h:m:i');
try{
    $dbh=get_db_connect();
    session_start();
    $session_id=session_id();
    if(isset($_SESSION['click'])) {
                $_SESSION['click'] = $_SESSION['click']+ 1;
            }else{ 
                $_SESSION['click'] = 1;
            }
            // echo "click = ". $_SESSION['click'];
    if($_SERVER['REQUEST_METHOD']==='GET'){
        if(isset($_GET['product_id']) && $_SESSION['click']==1){
            $product_id=$_GET['product_id'];
            $check_duplicate_product_by_session=check_duplicate_product_by_session($dbh,$product_id,$session_id);
            if(count($check_duplicate_product_by_session)==0){
                $c=insert_product_by_session($dbh,$product_id,$session_id,$create_datetime,$c);
            }else{
                $g=update_product_duplicate_by_session($dbh,$product_id,$session_id,$g);    
            }
            
        }
        if(isset($_GET['delete_item'])){
            $delete_id=$_GET['delete_item'];
            $d=delete_product_by_session($dbh,$delete_id,$session_id,$d);
        }
        
        if(isset($_GET['stock_update'])){
            $id_product=$_GET['id_product'];
            $stock_update=$_GET['stock_update'];
            update_stock_t_product_history($dbh,$id_product,$stock_update,$session_id);
            }
    }

    if($_SERVER['REQUEST_METHOD']==='POST'){
            $status=check_store_t_product_by_session($dbh,$session_id);
            foreach ($status as $key => $read){
                if($read['status'] <0){
                    $err_msg[]='品数が間違っていますが、もう一度選択してください。';
                }
                
            } 
                if (count($err_msg)==0){
                    if(isset($_COOKIE['account_id'])){
                    $user_id=$_COOKIE['account_id'];
                    }
                    $e=insert_product_by_user($dbh,$user_id,$session_id,$e);
                    $j=update_stock_in_t_product($dbh,$session_id,$j);
                    $f=delete_t_product_history($dbh,$session_id,$f);
                    
                    $dbh->commit();
                    $_SESSION = array();
                    session_destroy();
                    // header('Location: fruit.php');
                    // exit;
                }
    } 

    $list_product_in_cart=get_list_product_by_session($dbh,$session_id);
    $report_t_product_of_session=report_t_product_history($dbh,$session_id);
    
                
    // echo 'test list:'.count($list_product_in_cart).'<br>';
    // echo 'user_id:'.$user_id.'<br>';
    // echo 'item_id:'.$item_id.'<br>';
    // echo 'order_stock:'.$order_stock.'<br>';
    // echo 'amount:'.$amount.'<br>';
    // echo 'c:'.$c.'<br>';
    // echo 'd:'.$d.'<br>';
    // echo 'e:'.$e.'<br>';
    // echo 'f:'.$f.'<br>';
    // echo 'product_id:'.$product_id.'<br>';
    // echo 'delete_id:'.$delete_id.'<br>';
    // echo 'session_id:'.$session_id.'<br>';
    
 

}catch(Exception $e){
        $err_msg[]=$e->getMessage();
}

include_once './view/cart_view.php';

?>