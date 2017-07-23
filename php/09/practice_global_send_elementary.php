<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>practice_global_send_elementary</title>
    </head>
    <body>
        <form method="post" action="practice_global_receive_elementary.php">
            <lable>お名前：<input type="text" name="name" value="<?php if(isset($name)===TRUE){print $name;}?>"></lable>
            <input type="submit" value="送信">
        </form>
    </body>
</html>