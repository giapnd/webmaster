<?php
require './conf/const.php';
require './model/common.php';
require './model/login_model.php';

$err_msg=[];
$message='';
try{
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $email=htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
        $password=htmlspecialchars($_POST['password'],ENT_QUOTES,'UTF-8');
        $create_datetime=date('Y-m-d h:m:i');
        $err_msg=[];
    }
    $err_msg=validation($email,$password);
    $dbh=get_db_connect();
    if(($_SERVER['REQUEST_METHOD']==='POST') && isset($_POST['email']) && isset($_POST['password'])) {
        if (count($err_msg)===0){
            $info_account=check_account($dbh,$email,$password);
            if (count($info_account)!==0){
                foreach($info_account as $read){
                header('Location: ./itemlist.php?');
                setcookie('account_name', $read['name_kanji'], time() + 3600);
                exit;
                }
            }else {
            $message='入力するアカウントが間違っています。もう一度入力してください';
            }
        }
    }
}catch(Exception $e){
    $err_msg[]=$e->getMessage();
}

include_once './view/login_view.php';

?>