<?php
require './conf/const.php';
require './model/common.php';
require './model/register_model.php';


$err_msg=[];
$message='';
try{
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $kanji_lastname=htmlspecialchars($_POST['kanji_lastname'],ENT_QUOTES,'UTF-8');
        $kanji_firstname=htmlspecialchars($_POST['kanji_firstname'],ENT_QUOTES,'UTF-8');
        $furi_lastname=htmlspecialchars($_POST['furi_lastname'],ENT_QUOTES,'UTF-8');
        $furi_firstname=htmlspecialchars($_POST['furi_firstname'],ENT_QUOTES,'UTF-8');
        $post_first=htmlspecialchars($_POST['post_first'],ENT_QUOTES,'UTF-8');
        $post_last=htmlspecialchars($_POST['post_last'],ENT_QUOTES,'UTF-8');
        $mobile_first=htmlspecialchars($_POST['mobile_first'],ENT_QUOTES,'UTF-8');
        $mobile_mid=htmlspecialchars($_POST['mobile_mid'],ENT_QUOTES,'UTF-8');
        $mobile_last=htmlspecialchars($_POST['mobile_last'],ENT_QUOTES,'UTF-8');
        $email=htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
        $password=htmlspecialchars($_POST['password'],ENT_QUOTES,'UTF-8');
        $re_password=htmlspecialchars($_POST['re_password'],ENT_QUOTES,'UTF-8');
        $create_datetime=date('Y-m-d h:m:i');
        $err_msg=[];
    }
    $err_msg=validation($kanji_lastname,$kanji_firstname,$furi_lastname,$furi_firstname,$post_first,$post_last,$mobile_first,$mobile_mid,$mobile_last,$email,$password,$re_password);
    $dbh=get_db_connect();
    $check_duplicate_account=check_account_duplicate($dbh,$email);
    if(count($check_duplicate_account) !=0){
        $msg='作成メールは重複しています';
    }else {
        if(($_SERVER['REQUEST_METHOD']==='POST') && count($err_msg)===0){
            $message=add_user($dbh,$kanji_lastname,$kanji_firstname,$furi_lastname,$furi_firstname,$post_first,$post_last,$mobile_first,$mobile_mid,$mobile_last,$email,$password,$create_datetime);
            session_start();
            if (isset($_SESSION['account_id'])) {
                $account_id = $_SESSION['account_id'];
            }else {
                $info_account=check_account($dbh,$email,$password);
                foreach($info_account as $read){
                    setcookie('account_name',$read['name_kanji'], time() + 3600);
                    setcookie('account_id', $read['id'], time() + 3600);
                    if($read['permisions']==1){
                        setcookie('permisions', $read['permisions'], time() + 3600);
                    }
                }
                header('Location: /fruitshop/fruit.php?');
                exit;
            }   
        }
    }

}catch(Exception $e){
        $err_msg[]=$e->getMessage();
}

include_once './view/register_view.php';

?>