<?php
$sex = '';
$mail_receive = '';
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['name'])===TRUE){
        $name=htmlspecialchars($_POST['name'],ENT_QUOTES,'UTF-8');
    }
    if(isset($_POST['sex'])===TRUE){
        $sex=htmlspecialchars($_POST['sex'],ENT_QUOTES,'UTF-8');
    }
    if(isset($_POST['mail_receive'])===TRUE){
        $mail_receive=htmlspecialchars($_POST['mail_receive'],ENT_QUOTES,'UTF-8');
    }
    
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>challenge_super_global</title>
    </head>
    <body>
        <h1>課題</h1>
        <?php
        if(isset($name)===TRUE){
        ?>
            <p>ここに入力したお名前を表示：<?php print $name ?></p>
        <?php
        }
        ?>
        <?php
        if($sex==='男' || $sex==='女'){
        ?>
            <p>ここに選択した性別を表示：<?php print $sex ?></p>
        <?php
        }
        ?>
        <?php
        if($mail_receive==='OK'){
        ?>    
            <p>ここにメールを受け取るを表示：<?php print $mail_receive ?></p>
        <?php    
        }
        ?>
        <form method="post">
            <lable>お名前：<input type="text" name="name" value="<?php if(isset($name)){print $name;}?>"></lable><br>
            <lable>性別：
            <input type="radio" name="sex" value="男" <?php if ($sex === '男') { print 'checked'; } ?>>男
            <input type="radio" name="sex" value="女" <?php if ($sex === '女') { print 'checked'; } ?>>女
            </lable><br>
            <input type="checkbox" name="mail_receive" value="OK" <?php if($mail_receive==='OK'){ print 'checked';}?>>お知らせメールを受け取る<br>
            <input type="submit" value="送信">
        </form>
    </body>
</html>