<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>Logical</title>
    </head>
    <body>
        <pre>
            <?php
            $core_1=mt_rand(0,100);
            $core_2=mt_rand(0,100);
            $sum=$core_1+$core_2;
            print 'core_1: '.$core_1."\n";
            print 'core_2: '.$core_2."\n";
            print 'sum: '.$sum."\n";
            if($sum>=160 || $core_1===100 || $core_2===100){
                print '特待生'."\n";
            }else if ($sum>=120 && $core_1>=40 && $core_2>=40 ){
                print '合格！！'."\n";
            }else if($sum>=100){
                print '補欠合格' . "\n";
            }else{
                print '不合格'."\n";
            }
            ?>
        </pre>
    </body>
</html>