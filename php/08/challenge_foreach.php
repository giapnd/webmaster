<?php
$class = ['ガリ勉' => '鈴木', '委員長' => '佐藤', 'セレブ' => '斎藤', 'メガネ' => '伊藤', '女神' => '杉内'];
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>challenge_foreach</title>
    </head>
    <body>
        <?php
        foreach($class as $key => $name){
        ?>
        <p><?php print $key; ?>さんのアダ名は<?php print $name; ?>です。</p>
        <?php
        }
        ?>
    </body>
</html>
