<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['name'])===TRUE){
        $name=htmlspecialchars($_POST['name'],ENT_QUOTES,'UTF-8');
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>practice_global_receive_elementary</title>
    </head>
    <body>
        <?php
        if(isset($_POST['name'])===TRUE && $name !==''){
            print '<p>ようこそ'.$name.'さん</p>';
        }else{
            print '<p>名前を入力してください。</p>';
        }
        ?>
    </body>
</html>