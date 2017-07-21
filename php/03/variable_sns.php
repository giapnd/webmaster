<?php
$name='田中';
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>変数の使用列</title>
    </head>
    <body>
        <h1>変数の使用列</h1>
        <p>ようこそ<?php print $name;?>さん</p>
        <ul>
            <li><a href="#"><?php print $name?>さんのマイページを見る</a></li>
        </ul>
    </body>
</html>