<?php
if($_SERVER['REQUEST_METHOD'] !=='POST'){
    header('Location:session_sample_top.php');
    exit;
}
session_start();
$email=get_post_data('email');
$passwd=get_post_data('passwd');
setcookie('email',$email,time()+60*60*24*365);
// setcookie('passwd',$passwd,time()+60*60*24*365);
$data[0]['user_id']='codetaro';
if(isset($data[0]['user_id'])){
    $_SESSION['user_id'] = $data[0]['user_id'];
    header('Location: session_sample_home.php');
    exit;
}else{
    header('Location:session_sample_top.php');
    exit;
}
function get_post_data($key){
    $str='';
    if(isset($_POST[$key])){
        $str=$_POST[$key];
    }
    return $str;
}

?>