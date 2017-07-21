<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>if_sample</title>
    </head>
    <body>
        <?php
        $rand=mt_rand(1,10);
        ?>
        <p>抽選システム</p>
        <p>値葉：<?php print $rand ?></p>
        <?php if ($rand<=3) { ?>
        <p>当たり！！</p>
        <?php } else { ?>
        <p>残念でした・・また引いてね</p>
        <?php } ?>
    </body>
</html>