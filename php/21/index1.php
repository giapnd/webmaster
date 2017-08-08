<?php
require './conf/const.php';
require './model/function.php';
$err_msg=[];
$img_dir='img/';
$dbh=get_db_connect();
$list_drink=get_list_drink_active($dbh);



include_once './view/index1.php';
?>