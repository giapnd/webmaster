<!DOCTYPE html>
<html jang="ja">
    <head>
        <meta charset="UTF-8">
        <title>自動販売機結果</title>
    </head>
    <body>
        <h2>自動販売機結果</h2>
        <?php if (count($msg)!==0){?>
            <?php foreach($msg as $key => $value) {?>
            <p class="msg"><?php print $value; ?></p>
            <?php }?>
        <?php }?>
        <a href="./index1.php">戻る</a>
    </body>
</html>