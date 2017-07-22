<?php
$list=array();
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>challenge_loop</title>
    </head>
    <body>
        <?php
        for($i=1 ; $i<=100 ; $i++){
        ?>
        <?php
        if($i%3 ===0 && $i%5 !==0){
            $list[$i]='Fizz';
        }else if($i%3 !==0 && $i%5 ===0){
            $list[$i]='Buzz';
        }else if($i%3 ===0 && $i%5 ===0){
            $list[$i]='FizzBuzz';
        }else{
            $list[$i]=$i;
        }
        ?>
        <?php
        }
        ?>
        <?php foreach($list as $key =>$value){
        ?>
        <p><?php print $value; ?></p>
        <?php
        }
        ?>
    </body>
</html>
