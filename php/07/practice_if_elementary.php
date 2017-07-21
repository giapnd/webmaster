<!DOCTYPE htmp>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>practice_if_elementary</title>
    </head>
    <body>
        <pre>
        <?php
            $rand_1 = mt_rand(0,2);
            $rand_2 = mt_rand(0,2);
            print 'rand_1: '.$rand_1."\n";
            print 'rand_2: '.$rand_2."\n";
            if($rand_1 > $rand_2){
                print 'rand_1の数値は大きいよりrand_2です。';
            }else if($rand_1 === $rand_2){
                print 'rand_1の数値はrand_2の数値です。';
            }else{
                print 'rand_2の数値は大きいよりrand_1です。';
            }
        ?>
        </pre>
    </body>
</html>