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
                    session_start();
                    if (isset($_SESSION['account_id'])) {
                        $account_id = $_SESSION['account_id'];
                    }else {
                        setcookie('account_name', $read['name_kanji'], time() + 3600);
                        setcookie('account_id', $read['id'], time() + 3600);
                        if($read['permisions']==1){
                            setcookie('permisions', $read['permisions'], time() + 3600);
                        }
                        header('Location: /fruitshop/fruit.php?');
                        exit;
                    }
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