<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>challenge_if</title>
    </head>
    <body>
        <?php
        $saikon=mt_rand(1,6);
        $check=$saikon%2;
        print '<p>出た数字：'.$saikon.'</p>';
        if($check===0){
            print('偶数');
        }else{
            print('奇数');
        }
        ?>
    </body>
</html>