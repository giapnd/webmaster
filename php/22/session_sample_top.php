<?php
session_start();
if(isset($_SESSION['user_id'])){
    header('Location:session_sample_home.php');
    exit;
}
if(isset($_COOKIE['email'])){
    $email=$_COOKIE['email'];
}else{
    $email='';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログイン</title>
        <link rel="stylesheet" href="session.css">
    </head>
    <body>
        <form action="./session_sample_login.php" method="post">
            <lable for="email">メールアドレス</lable>
            <input type="text" id="email" name="email" value="<?php print $email;?>">
            <lable for="passwd">パスワード</lable>
            <input type="text" id="passwd" name="passwd" value="">
            <input type="submit" value="ログイン">
        </form>
    </body>
</html>