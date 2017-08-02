<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>正規表現課題</title>
    </head>
    <body>
        <?php
        $subject='1500';
        $pattern='/^[1][0-9]{3}$/';
        if(preg_match($pattern,$subject)){
            print $subject.'は半角数字です。';
        }else{
            print $subject.'は半角数字ではありません';
        }
        print '<br>';
        $subject='Codecamp';
        $pattern='/^[A-Z][a-zA-Z]*$/';
        if(preg_match($pattern,$subject)){
            print $subject.'は半角英字です。';
        }else{
            print $subject.'は半角英字ではありません。';
        }
        print '<br>';
        $subject='160-0023';
        $pattern='/^\d{3}[-]\d{4}$/';
        if(preg_match($pattern,$subject)){
            print $subject.'は郵便番号の形式です。';
        }else{
            print $subject.'は郵便番号の形式ではありません。';
        }
        ?>
    </body>
</html>