<?php
$sum=0;
$i=1;
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>challenge_while</title>
    </head>
    <body>
        <?php
        while($i<=100){
        ?>
        <?php
        if ($i%3 ===0){
            $sum=$sum+$i;
        }
        ?>
        <?php
        $i++;
        }
        ?>
        <h1>合計：<?php print $sum;?></h1>
    </body>
</html>