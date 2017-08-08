<?php
require './conf/const.php';
require './model/function.php';
$msg=[];
$img_dir='img/';
$update_datetime=date('Y-m-d h:m:i');
try{
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $kingaku=$_POST['kingaku'];
        $choice=$_POST['choice'];
    }
    $msg=validation_result($kingaku,$choice); 
    }catch(Exception $e){
            $err_msg[]=$e->getMessage();
}

include_once './view/result.php';
?>