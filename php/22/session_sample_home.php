<?php
session_start();
if(isset($_SESSION['user_id'])){
    $user_id=$_SESSION['user_id'];
}else{
    header('Location:session_sample_top.php');
    exit;
}
$data[0]['user_name']='コード太郎';
if (isset($data[0]['user_name'])){
    $user_name=$data[0]['user_name'];
}else{
    header('Location:session_sample_logout.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ホーム</title>
    </head>
    <body>
        <p>ようこそ<?php print $user_name; ?></p>
        <form action='./session_sample_logout.php' method="post">
            <input type="submit" value="ログアウト">
        </form>
    </body>
</html>