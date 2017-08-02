<?php
require './conf/setting.php';
require './model/model.php';

$read=[];
$err_msg=[];

try{
    $err_msg=validation();
    $dbh=get_db_connect();
    $add_comment=add_comment_table($dbh,$sql);
    $get_list_comment=get_user_comment($dbh);
}catch(Exception $e){
    $err_msg[]=$e->getMessage();
}

include_once './view/view.php';

?>