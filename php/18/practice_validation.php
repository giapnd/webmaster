<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $user_id=$_POST['user_id'];
            $user_id_regex='/^[a-zA-Z0-9]{6,8}$/';
            $nenrei=$_POST['nenrei'];
            $nenrei_regex='/^[0-9]{3}$/';
            $mail=$_POST['mail'];
            $mail_regex='/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/iD';
            $tel=$_POST['tel'];
            $tel_regex='/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}/';
            if(preg_match($user_id_regex,$user_id)){
                print $user_id.'は正しいユーザIDです。<br>';
            }else{
                print $user_id.'は正しくないユーザIDです。<br>';
            }
            if(preg_match($nenrei_regex,$nenrei)){
                print $nenrei.'は正しい年齢です。<br>';
            }else{
                print $nenrei.'は正しくない年齢です。<br>';
            }
            if(preg_match($mail_regex,$mail)){
                print $mail.'は正しいメールアドレスです。<br>';
            }else{
                print $mail.'は正しくないメールアドレスです。<br>';
            }
            if(preg_match($tel_regex,$tel)){
                print $tel.'は正しい電話番号です。<br>';
            }else{
                print $tel.'は正しくない電話番号です。<br>';
            }
            
        }
        ?>
    </body>
</html>