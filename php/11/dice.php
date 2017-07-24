<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>サイコロ</title>
    </head>
    <body>
        <pre>
            <?php
            print 'サイコロを個振る:'.throw_dice(1)."\n";
            print 'サイコロを個振る:'.throw_dice(1)."\n";
            print 'サイコロを個振る:'.throw_dice(2)."\n";
            print 'サイコロを個振る:'.throw_dice(2)."\n";
            print 'サイコロを個振る:'.throw_dice(3)."\n";
            print 'サイコロを個振る:'.throw_dice(4)."\n";
            
            function throw_dice($num){
                $sum=0;
                for($i=0 ; $i < $num ; $i++){
                    $sum=$sum+mt_rand(1,6);
                }
                return $sum;
            }
            ?>
            
        </pre>
    </body>
</html>