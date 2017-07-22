<?php
$sum=0;
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>challenge_for</title>
    </head>
    <body>
        <?php
        for($i=1 ; $i<=100 ; $i++){
        ?>
        <?php
        if ($i%3 ===0){
            $sum=$sum+$i;
        }
        ?>
        <?php
        }
        ?>
        <h1>合計：<?php print $sum;?></h1>
    </body>
</html>