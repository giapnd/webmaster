<?php
function validation($email,$password){
    $err_msg=[];
    $pattern='/\D/';
    $pattern_email='/[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}/';
    $pattern_pass='^(?=.*[A-Z].*[A-Z])(?=.*[!@#$&*])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z].*[a-z]).{8}$';
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(preg_match($pattern_email,$email)){
            $err_msg[]='メールアドレスではありません';
        }
    return $err_msg;
    }
}

?>