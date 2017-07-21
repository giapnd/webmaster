<?php
$apple=100;
$grape=150;
$sum=$apple*3+$grape*2 ;
$sum_tax=$sum+$sum*8/100 ;
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>practice_operator</title>
    </head>
    <body>
        <p>合計：<?php print $sum_tax;?></p>
    </body>
</html>