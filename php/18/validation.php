<!DOCTYPE html>
<html>
    <head lang="ja">
        <meta charset="UTF-8">
        <title>バリデーション</title>
    </head>
    <body>
        <?php
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $email=$_POST['email'];
            $email_regex='/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/iD';
            $tel=$_POST['tel'];
            $tel_regex='/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}/';
            if(preg_match($email_regex,$email)){
                print $email.'は正しいメールアドレスです。<br>';
            }else{
                print $email.'は正しくないメールアドレスです。<br>';
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